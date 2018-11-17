<?php
include 'mail_helper/mail.php';
include 'connection/connect.php';

if(isset($_POST['submit']))
{
	$fname = test_input($_POST['first_name']);
	$lname = test_input($_POST['last_name']);
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$confirm_password = test_input($_POST['confirm_password']);
	$gender = test_input($_POST['gender']);
	if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password))
	{
		$error = "<div class='text-danger'>Please fill out the form!</div>";	
	}
	else
	{
		$pattern = "/^['a-zA-Z ']+$/";
		if(preg_match($pattern, $fname))
		{
			if(preg_match($pattern, $lname))
			{
				if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
				{
					if(strlen($password) > 4 && strlen($confirm_password) > 4)
					{
						if($password == $confirm_password)
						{
							if(!empty($gender))
							{
								$query = "Select `email` from `users` where `email`='$email'";
								$check_email = mysqli_query($con,$query);
								if(mysqli_num_rows($check_email) == 1)
								{
								$error = "<div class='text-danger'>Email already exist!</div>";
								}
								else
								{
									$code = rand();
									$status = 0;
									$password = password_hash($password,PASSWORD_DEFAULT);
									$query = "INSERT INTO users (first_name,last_name,email,password,gender,code,status) VALUES('$fname','$lname','$email','$password','$gender','$code','$status')";
									$query_run = mysqli_query($con,$query);
									if($query_run)
									{
										//send_code($code,$email);
										$_SESSION['email'] = $email;
										$_SESSION['account_create'] = "Your account is successfully created";
										header("Location: confirm.php");
									}
									else
									{
										$error = "<div class='text-danger'>Failed</div>";
									}	

								}
							}
							else
							{
							$error = "<div class='text-danger'>Please select gender</div>";
							}
						}
						else
						{
						$error = "<div class='text-danger'>password is not matched!</div>";
						}
					}
					else
					{
					$error = "<div class='text-danger'>Your password is too weak!</div>";
					}
				}
				else
				{
				$error = "<div class='text-danger'>Your Email is invaid</div>";
				}
			}
			else
			{
			$error = "<div class='text-danger'>Last name must be charcter</div>";
			}
		}
		else
		{
			$error = "<div class='text-danger'>First name must be charcter</div>";
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
    <title>Signup Confirmation</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <div class="container" style="margin-top:50px;">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<span id="header">Create User Account</span>
    					<span class="glyphicon glyphicon-pencil c-pencil pull-right"></span>
    				</div>
    					<div class="panel-body">
    						<form action="home.php" method="POST">
    							<div class="form-group">
    								<?php
    								if(isset($error)):
    									echo $error;
    								endif;
    								?>
    							</div>
    							<div class="form-group">
    								<input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php
    								if(isset($fname))
    								{
    									echo $fname;
    								}?>">
    							</div>
    							<div class="form-group">
    								<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="<?php
    								if(isset($lname))
    								{
    									echo $lname;
    								}?>">
    							</div>
    							<div class="form-group">
    								<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php
    								if(isset($email))
    								{
    									echo $email;
    								}?>">
    							</div>
    							<div class="form-group">
    								<input type="password" name="password" class="form-control" placeholder="Choose Password">
    							</div>
    							<div class="form-group">
    								<input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
    							</div>
    							<div class="form-group">
    								<select name="gender" class="form-control">
    									<option value=''>Select Gender</option>
    									<option value="male">Male</option>
    									<option value="female"></option>
    								</select>
    							</div>
    							<div class="form-group">
    								<input type="submit" name="submit" class="btn btn-success btn-block" value="Create Account">
    							</div>
    						</form>
    					</div>
    			</div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <!-- <script type="text/javascript" src="ajax1.js"></script> -->
</body>
</html>