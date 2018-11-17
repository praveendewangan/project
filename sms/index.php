<!DOCTYPE html>
<html>
<head>
	<title>Student management system</title>
	<style>
	body{
		padding:0;
		margin:0;
	}
		table{
			border-collapse:collapse;
			border:3px solid #273356;
			font-family:monospace;
		}
		input[type="text"]{
			padding: 5px;
		}
		select{
			padding: 5px;
			background:#2c5556;
			color:white;
		}
		input[type="submit"]{
			background:#2c5556;
			color:white;
			padding: 8px;
			border:none;
			transition:.2s all linear;
		}
		input[type="submit"]:hover{
			box-shadow: 1px 1px 5px 0px rgba(0,0,0,0.5);
		}
	
	</style>
</head>
<body>
	<h2 align="center" style="background:#2e5e75;color:white;font-family:sans-serif;padding:15px;margin:0;">Welcome to student management system</h2>
	<h3 align="right"><button style="background:#273356;border:none;outline:none;"><a href="login.php" style="text-decoration:none;color:white;font-size:20px;">Admin login</a></button></h3>
	
	<form action="index.php" method="POST">
		<table align="center" border="1" cellpadding="10">
			<tr>
				<td colspan="2" align="center" style="background:#273356;color:white;"><b>Student Information</b></td>
			</tr>
			<tr>
				<td>Choose Standard</td>
				<td>
					<select name="standard">
						<option value="1">1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4th</option>
						<option value="5">5th</option>
						<option value="6">6th</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Enter Roll Number</td>
				<td>
					<input type="text" name="rollno" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Show details">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	
	$roll_no = $_POST['rollno'];
	$standard = $_POST['standard'];
	if(!empty($roll_no) && !empty($standard)){
		include("dbcon.php");
		include("function.php");
		showdetails($roll_no,$standard);
	}
}
?>