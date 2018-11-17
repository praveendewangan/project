<?php

class Login extends MY_Controller
{
	
	public function index()
	{
		if($this->session->userdata('user_id')){
			return redirect('admin/dashboard');
		}else
		{
			$this->load->view('public/admin_login');	
		}
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','trim|required|alpha|max_length[20]');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run())
		{//if true

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			$id = $this->login_model->login_valid($username,$password);
			if($id)
			{
				// Credential valid login user				
				$this->session->set_userdata('user_id',$id);
				return redirect('admin/dashboard');

			}else
			{
				// Authentication failed
				$this->session->set_flashdata('login_failed','Invalid username/password.');
				return redirect('login');
			}
		}else
		{
			$this->form_validation->set_error_delimiters("<span class='text-danger'>","</span>");
			$this->load->view('public/admin_login');
			// echo validation_errors();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
?>