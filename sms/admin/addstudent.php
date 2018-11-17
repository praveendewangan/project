<?php
session_start();

if(isset($_SESSION['id'])){
	//echo $_SESSION['id'];
}else{
	header("Location : ../login.php");
}

include("header.php");
include("titlehead.php");
?>
<div class="form_container">
	<form action="addstudent.php" method="POST" enctype="multipart/form-data">
		<div class="form_box">
			Roll No. : <br>
			<input type="text" name="rollno" placeholder="Enter roll number" required><br><br>
			Full Name : <br>
			<input type="text" name="fname" placeholder="Enter name" required><br><br>
			City : <br>
			<input type="text" name="city" placeholder="Enter city" required><br><br>
			Parent Contact No. : <br>
			<input type="text" name="pcontact" placeholder="Enter parent contact number" required><br><br>
			Standard : <br>
			<input type="number" name="standard" placeholder="Enter standard" required><br><br>
			Image : <br>
			<input type="file" name="image" ><br><br><br>
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$roll_no = $_POST['rollno'];
	$fname = $_POST['fname'];
	$city = $_POST['city'];
	$pcontact = $_POST['pcontact'];
	$standard = $_POST['standard'];
	$image_name = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];
	
	if(!empty($roll_no) && !empty($fname) && !empty($city) && !empty($pcontact) && !empty($standard) && !empty($image_name)){
		
		if(move_uploaded_file($tmp_name,"../dataimg/$image_name")){
			include("../dbcon.php");
			$query = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$roll_no','$fname','$city','$pcontact','$standard','".$image_name."')";
			
			if($query_run = mysqli_query($con,$query)){
				?>
				<script>
					alert("Data inserted successfully!");
				</script>
				<?php
			}else{
				?>
				<script>
					alert("Something went wrong!");
				</script>
				<?php
			}
		}else{
			echo "File not uploaded";
		}
	}else{
		echo "Please fill all detailes";
	}

}
?>