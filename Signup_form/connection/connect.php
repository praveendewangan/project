<?php
session_start();
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'signup_form';

class serverException extends Exception{}
class databaseException extends Exception{}
try {
    if(!($con = @mysqli_connect($host,$username,$password))){
        throw new serverException ("Could not connect to server.");
    }else if(!@mysqli_select_db($con,$db)){
        throw new databaseException ("Could not select database.");
    }else{
        echo "";
    }
}catch (serverException $e){
    echo "Error: ".$e->getMessage();
}catch (databaseException $e){
    echo "Error: ".$e->getMessage();
}
?>