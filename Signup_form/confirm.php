<?php
include 'connection/connect.php';


if(isset($_POST['confirm_submit']))
{
	if(empty($_POST['confirm_code']))
	{
		$error = "<div class='text-danger'>Please enter code</div>";
	}
	else
	{
		$code = test_input($_POST['confirm_code']);
		$email = $_SESSION['email'];
		$query = "SELECT code from users where email='$email' and code='$code'";
		$query_run = mysqli_query($con, $query);
		if(mysqli_num_rows($query_run) == 1)
		{
			$query = "UPDATE users set status='1' where email='$email' and code='$code'";
			$query_run = mysqli_query($con, $query);
			if($query_run)
			{
				$_SESSION['confirmation_success'] = "Your Account is Successfully Confirm!";
				header("Location: login.php");
			}
			else
			{
		$error = "<div class='text-danger'>Something went wrong!</div>";
			}
		}
		else
		{
		$error = "<div class='text-danger'>Invalid code</div>";
		}
	}

}
function test_input($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php
					if(isset($_SESSION['please_confirm']))
					{
						echo "<div class='alert alert-danger'>".$_SESSION['please_confirm']."</div>";
					}
					unset($_SESSION['please_confirm']);
					if(isset($_SESSION['account_create']))
					{
						echo "<div class='alert alert-success'>".$_SESSION['account_create']."</div>";
					}
					unset($_SESSION['account_create']);
				?>
				<h4>Please Confirm Your Email</h4>
				<form action="" method="POST">
					<?php 
						if(isset($error))
						{
							echo $error;
						}
					?>
					<div class="input-group">
						<input type="text" name="confirm_code" class="form-control" placeholder="Enter Confirmation code">
						<div class="input-group-btn">
							<input type="submit" name="confirm_submit" value="Submit" class="btn btn-success">
						</div>
					</div>					
				</form>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</body>
</html>