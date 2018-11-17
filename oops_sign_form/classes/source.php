<?php
/**
 * 
 */
class source extends db
{
	public $query;

// Query method accept all database query;
	public function query($query,$param = [])
	{
		if(empty($param))
		{
			return $this->query = mysqli_query($this->db,$query);
		}
		else
		{
			return $this->query = mysqli_query($this->db,$query);
		}
	}

	public function count_rows()
	{
		return mysqli_num_rows($this->query); 
	}

	public function fetch_data()
	{
		return mysqli_fetch_assoc($this->query);
	}

	// fetch row for specific table

	public function single()
	{
		return mysqli_fetch_row($this->query);
	}

}
?>