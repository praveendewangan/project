<?php

class db
{
	private $host = "localhost";
	private $username = "root";
	private $database = "oop_signup";
	private $password = "";
	protected $db;

	public function __construct()
	{
		try
		{
		    if ($this->db = @mysqli_connect($this->host,$this->username,$this->password,$this->database))
		    {
		    	// echo "connected";
		    }
		    else
		    {
		        throw new Exception(mysqli_connect_error());
		    }
		}
		catch(Exception $e)
		{
		    echo $e->getMessage();
		}
	}
}
?>