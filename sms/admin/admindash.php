<?php
session_start();

if(isset($_SESSION['id'])){
	//echo $_SESSION['id'];
}else{
	header("Location : ../login.php");
}

include("header.php");
?>

	<div class="admin_title">
		<h1>Welcome to Admin Dashboard</h1>
		<h4><a href="logout.php">Logout</a></h4>
	</div>
	
	<div class="dashboard">
		<table border="2" style="border-collapse:collapse;">
			<tr>
				<td>1</td><td style="text-align:left;padding-left: 35px;"><a href="addstudent.php">Inset Student Details</a></td>
			</tr>
			<tr>
				<td>2</td><td style="text-align:left;padding-left: 35px;"><a href="updatestudent.php">Update Student Details</a></td>
			</tr>
			<tr>
				<td>3</td><td style="text-align:left;padding-left: 35px;"><a href="deletestudent.php">Delete Student Details</a></td>
			</tr>
		</table>
	</div>
</body>
</html>