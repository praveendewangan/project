<?php
$host = "localhost";
$username = "root";
$pass = "";

if(!@($con = mysqli_connect($host,$username,$pass))){
	echo "Could not connect!";
}else{
	if(!@mysqli_select_db($con,'sms')){
		echo "Could not connect to database!";
	}else{
		//echo "Ok";
	}
}
?>