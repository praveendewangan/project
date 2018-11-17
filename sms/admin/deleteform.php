<?php
	$id = $_REQUEST['sid'];
	
			include("../dbcon.php");
			$query = "Delete from `student` where `id`='$id'";
			
			if($query_run = mysqli_query($con,$query)){
				?>
				<script>
					alert("Student deleted successfully!");
					window.open("deletestudent.php","_self");
				</script>
				<?php
			}else{
				?>
				<script>
					alert("Something went wrong!");
				</script>
				<?php
			}
?>