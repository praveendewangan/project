<?php

/**
 * 
 */
class Home_model extends CI_Model
{
	
	function submit_data($data)
	{
			$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
			$query = $this->db->insert('users',$data);
			if($query)
			{
				$result['response'] = true;
				$result['message'] = "Your account has created successfully!";
				return $result;
			}
			else
			{
				$result['response'] = false;
				$result['message'] = "Something wrong with our database!";
				return $result;
			}	
	}

	public function check_user($data)
	{
		$query = $this->db->query("Select * from users where email='".$data['email']."' and mobile='".$data['mobile']."'");
		if(empty($query->result()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function login_activate($data)
	{
		$query = $this->db->query("Select password from users where email='".$data['email']."'");
		$query = $query->row();
		if(!empty($query))
		{
			$password = $data['password'];
			$password_hash = $query->password;
				//print_r(password_verify($password,$password_hash));exit;
			if(password_verify($password,$password_hash))
			{
				$this->session->set_userdata('username',$data['email']);
				$result['response'] = true;
				$result['message'] = 'Hello user!';
				return $result;
			}
			else
			{
				$result['response'] = false;
				$result['message'] = 'Invalid password!';
				return $result;
			}
		}
		else
		{
			$result['response'] = false;
			$result['message'] = "Invalid email";
			return $result;
		}
	}
}
?>