<?php
include 'connection/connect.php';

if(isset($_POST['submit']))
{
	if(empty($_POST['email']) && empty($_POST['password']))
	{
		$error = "<div class='text-danger'>Please fill out the form.</div>";
	}
	else
	{
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		$query = "SELECT * from users where email='$email'";
		$query_run = mysqli_query($con,$query);
		if($row = mysqli_num_rows($query_run) == 1)
		{
			$result = mysqli_fetch_assoc($query_run);
			if($result['status'] == 0)
			{
				$_SESSION['please_confirm'] = "Please confirm your email..";
				header('Location:confirm.php');
			}
			else
			{
			$password_hash = $result['password'];
			if(password_verify($password,$password_hash))
			{
				$_SESSION['u_id'] = $result['id'];
				header("Location:profile.php");
			}	
			else
			{
		$error = "<div class='text-danger'>Please enter correct Password.</div>";
			}
			}

		}
		else
		{
		$error = "<div class='text-danger'>Please enter correct email.</div>";
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
	<title>Login Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php
					if(isset($_SESSION['confirmation_success']))
					{
						echo "<div class='alert alert-success'>".$_SESSION['confirmation_success']."</div>";
					}
					unset($_SESSION['confirmation_success']);
				?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>User Login</h3>
					</div>
					<div class="panel-body">
					
				<form action="" method="POST">
					<?php 
						if(isset($error))
						{
							echo $error;
						}
					?>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Enter Password">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-primary" value="Login">
					</div>	
				</form>	
					</div>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
</body>
</html>