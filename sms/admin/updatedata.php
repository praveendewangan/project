<?php
$roll_no = $_POST['rollno'];
	$fname = $_POST['fname'];
	$id = $_POST['sid'];
	$city = $_POST['city'];
	$pcontact = $_POST['pcontact'];
	$standard = $_POST['standard'];
	$image_name = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];
	
	if(!empty($roll_no) && !empty($fname) && !empty($city) && !empty($pcontact) && !empty($standard) && !empty($image_name)){
		
		if(move_uploaded_file($tmp_name,"../dataimg/$image_name")){
			include("../dbcon.php");
			$query = "Update `student` SET `rollno`='$roll_no', `name`='$fname', `city`='$city', `pcont`='$pcontact', `standard`='$standard',`image`='$image_name' where `id`='$id'";
			
			if($query_run = mysqli_query($con,$query)){
				?>
				<script>
					alert("Data inserted successfully!");
					window.open("updateform.php?sid=<?php echo $id?>","_self");
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
	}
?>