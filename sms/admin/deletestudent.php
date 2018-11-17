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
	<form action="deletestudent.php" method="POST" enctype="multipart/form-data">
		<div class="form_box">
			Enter Student Name : <br>
			<input type="text" name="fname" placeholder="Enter name" required><br><br>
			Enter Standard : <br>
			<input type="number" name="standard" placeholder="Enter standard" required><br><br><br>
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
</div>
<table align="center" border="1" width="80%" style="margin-top:10px;">
	<tr style="background:#000;color:white;">
		<th>No.</th>
		<th>Name</th>
		<th>Roll No.</th>
		<th>Image</th>
		<th>Edit</th>
	</tr>
<?php
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$standard = $_POST['standard'];
	
	if(!empty($fname) && !empty($standard)){
			include("../dbcon.php");
			$query = "Select * from `student` where `standard`='$standard' and `name` LIKE '%$fname%'";
			
			if($query_run = mysqli_query($con,$query)){
				if(mysqli_num_rows($query_run)>=1){
					$count=0;
					while($data = mysqli_fetch_assoc($query_run)){
						$count++;
						?>					
						<tr style="text-align:center;">
							<td><?php echo $count;?></td>
							<td><?php echo $data['name'];?></td>
							<td><?php echo $data['rollno'];?></td>
							<td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width:100px;"></td>
							<td><a href="deleteform.php?sid=<?php echo $data['id'];?>">Delete</a></td>
						</tr>
						<?php
					}
				}else{
					echo "<tr><td colspan='5'>No results found!</td></tr>";
				}
			}else{
				echo "Something went wrong in database";
			}
	}else{
		echo "Please fill all detailes";
	}

}
?>

</table>