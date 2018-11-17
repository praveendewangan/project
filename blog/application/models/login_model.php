<?php
/**
 * 
 */
class Login_model extends CI_Model
{
	public function login_valid($username,$password)
	{

		$q = $this->db->where(['uname'=>$username,'pword'=>$password])
						->get('user');
		if($q->num_rows()){
			return $q->row()->id;	
		}else{
			return false;
		}
	}
}
?>