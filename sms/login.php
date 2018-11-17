<?php
session_start();

if(isset($_SESSION['id'])){
	header("Location: admin/admindash.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<style>
		table{
			border-collapse:collapse;
			border:1px solid #273356;
			font-family:monospace;
		}
		input[type="submit"]{
			background:#2c5556;
			color:white;
			padding: 5px 15px;
			border:none;
			transition:.2s all linear;
		}
		input[type="submit"]:hover{
			box-shadow: 1px 1px 5px 0px rgba(0,0,0,0.5);
		}
	</style>
</head>
<body align="center">
	<h1>Admin Login</h1>
	<form actio="login.php" method="POST">
		<table align="center" cellpadding="10">
			<tr>
				<td>Username :</td><td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>Password :</td><td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include("dbcon.php");

if(isset($_POST['submit'])){
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password'";
		$query_run = mysqli_query($con,$query);
		$row = mysqli_num_rows($query_run);
			if($row < 1){
			?>
			<script>
				alert("Username and Password not match!");
				window.open("login.php",'_self');
			</script>
			<?php
			}else{
				$data = mysqli_fetch_assoc($query_run);
				$id = $data['id'];
				
				//session_start();
				$_SESSION['id'] = $id;
				header("Location: admin/admindash.php");
			}
	}else{
		echo "Please eneter username and password!";
	}
}
?>