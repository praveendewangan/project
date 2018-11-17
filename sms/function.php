<?php

	include("dbcon.php");
function showdetails($roll_num,$standard){
	include("dbcon.php");
	$query = "Select * from `student` where `rollno`='$roll_num' and `standard`='$standard'";
	$query_run = mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0){
		$data = mysqli_fetch_assoc($query_run);
		?>
		<table border="1" width="80%" align="center" style="margin-top:2%;">
			<tr>
				<th colspan="3">Student Details</th>
			</tr>
			<tr>
				<td rowspan="5" style="text-align:center;"><img src="dataimg/<?php echo $data['image'];?>" style="max-height:150px;max-width:120px;"></td>
				<th>Roll No</th>
				<td><?php echo $data['rollno'];?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data['name'];?></td>
			</tr>
			<tr>
				<th>Standard</th>
				<td><?php echo $data['standard'];?></td>
			</tr>
			<tr>
				<th>Parents Contact Number</th>
				<td><?php echo $data['pcont'];?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $data['city'];?></td>
			</tr>
		</table>
		<?php
	}else{
		echo "<script>alert('No student found!');</script>";
	}
}
?>