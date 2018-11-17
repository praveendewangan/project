<?php
session_start();

if(isset($_SESSION['id'])){
	//echo $_SESSION['id'];
}else{
	header("Location : ../login.php");
}

include("header.php");
include("titlehead.php");
include("../dbcon.php");

$sid = $_GET['sid'];
$query = "Select * from `student` where `id`='$sid'";
$query_run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($query_run);

?>

<div class="form_container">
	<form action="updatedata.php" method="POST" enctype="multipart/form-data">
		<div class="form_box">
			Roll No. : <br>
			<input type="text" name="rollno" value="<?php echo $data['rollno'];?>" placeholder="Enter roll number" required><br><br>
			Full Name : <br>
			<input type="text" name="fname" value="<?php echo $data['name'];?>" placeholder="Enter name" required><br><br>
			City : <br>
			<input type="text" name="city" value="<?php echo $data['city'];?>" placeholder="Enter city" required><br><br>
			Parent Contact No. : <br>
			<input type="text" name="pcontact" value="<?php echo $data['pcont'];?>" placeholder="Enter parent contact number" required><br><br>
			Standard : <br>
			<input type="number" name="standard" value="<?php echo $data['standard'];?>" placeholder="Enter standard" required><br><br>
			Image : <br>
			<input type="file" name="image" value="<?php echo $data['image'];?>" ><br><br><br>
			<input type="hidden" name="sid" value="<?php echo $data['id']?>">
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</div>
</body>
</html>