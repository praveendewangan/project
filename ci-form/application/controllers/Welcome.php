<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */ 
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = "Home";
		$this->load->view('base');
	}

	public function login()
	{
		$data['title'] = 'Login Page';
		$this->base('login',$data);
	}

	public function register()
	{
		$data['title'] = 'Register Page';
		$this->base('register',$data);
	}

	public function profile()
	{
		if($this->session->userdata('username'))
		{
			$data['title'] = 'Profile';
			$this->base('profile',$data);
		}
		else
		{
			return redirect('Welcome');
		}
	}

	public function base($page=NULL,$page_data=NULL)
	{
		$data['content'] = $page;
		$data['data'] = $page_data;
		$this->load->view('base',$data);
	}

	public function register_submit()
	{
		if(isset($_POST['submit']))
		{
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
			{

					$this->load->model('home_model','home');

						$post = $this->input->post();
						$data['name'] = $this->test_input($post['name']);
						$data['mobile'] = $this->test_input($post['mobile']);
						$data['email'] = $this->test_input($post['email']);
						$data['password'] = $this->test_input($post['password']);
						$data['confirm_password'] = $this->test_input($post['confirm_password']);
						$img = "userfile";	
						if($data['password'] == $data['confirm_password'])
						{
							if(strlen($data['password'])>5)
							{

									unset($data['confirm_password']);
									if(filter_var($data['email'],FILTER_VALIDATE_EMAIL))
									{
										$config = [
													'upload_path' => './uploads',
													'allowed_types' => 'jpg|jpeg|png|gif'
													];
											$this->load->library('upload',$config);
										if($this->home->check_user($data))
										{
											if(!$this->upload->do_upload($img))
											{
												$this->session->set_flashdata('user_name',$data['name']);
												$this->session->set_flashdata('user_email',$data['email']);
												$this->session->set_flashdata('user_mobile',$data['mobile']);
												$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Image not uploaded!'.print_r($this->upload->display_errors()).'</div>');
												return redirect('Welcome/register');
											}
											else
											{
												$image = $this->upload->data();
												$image_path = base_url("uploads/".$image['raw_name'].$image['file_ext']);
												$data['image_path'] = $image_path;
												$result = $this->home->submit_data($data);
												if($result['response'])
												{
													$this->session->set_flashdata('successMessage','<div class="alert alert-success">'.$result['message'].'</div>');
													return redirect('Welcome/register');
												}
												else
												{
													$this->session->set_flashdata('user_name',$data['name']);
													$this->session->set_flashdata('user_email',$data['email']);
													$this->session->set_flashdata('user_mobile',$data['mobile']);
													$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">'.$result['message'].'</div>');
												return redirect('Welcome/register');
												}
											}

										}
										else
										{
										$this->session->set_flashdata('user_name',$data['name']);
										$this->session->set_flashdata('user_email',$data['email']);
										$this->session->set_flashdata('user_mobile',$data['mobile']);
										$this->session->set_flashdata('errorMessage','<div class="alert-danger">User already exist!</div>');
										return redirect('Welcome/register');
										}
									}
									else
									{
									$this->session->set_flashdata('user_name',$data['name']);
									$this->session->set_flashdata('user_email',$data['email']);
									$this->session->set_flashdata('user_mobile',$data['mobile']);
									$this->session->set_flashdata('login_error_email','<br><div class="alert-danger">Please enter correct email!</div>');
									return redirect('Welcome/register');
									}
									

							}
							else
							{
									$this->session->set_flashdata('user_name',$data['name']);
									$this->session->set_flashdata('user_email',$data['email']);
									$this->session->set_flashdata('user_mobile',$data['mobile']);
									$this->session->set_flashdata('errorMessage','<div class="alert-danger">Password must be more than 5 characters!</div>');
									return redirect('Welcome/register');
							}
						}
						else
						{
							$this->session->set_flashdata('user_name',$data['name']);
							$this->session->set_flashdata('user_email',$data['email']);
							$this->session->set_flashdata('user_mobile',$data['mobile']);
							$this->session->set_flashdata('login_error_confirm_password','<br><div class="alert-danger">Password not matched!</div>');
							return redirect('Welcome/register');
						}
			}
			else
			{
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Please fill the form!</div>');
			return redirect("welcome/register");
			}
		}
		else
		{
			return redirect("welcome");
		}
	}


	public function signin()
	{
		if($_POST['submit'])
		 {
			if(!empty($_POST['email']) && !empty($_POST['password']))
			{
				$data['email'] =$this->test_input($_POST['email']);
				$data['password'] =$this->test_input($_POST['password']);
				if(filter_var($data['email'],FILTER_VALIDATE_EMAIL))
				{
					$this->load->model('home_model','home');
					$result = $this->home->login_activate($data);
					if($result['response'])
					{
						$this->session->set_flashdata('successMessage','<div class="alert alert-success">'.$result['message'].'</div>');
						$this->session->set_flashdata('login','<div class="alert alert-success">'.$result['message'].'</div>');
						return redirect('Welcome/profile');
					}
					else
					{
						$this->session->set_flashdata('user_email',$data['email']);
						$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">'.$result['message'].'</div>');
						return redirect("welcome/login");
					}
				}
				else
				{
					$this->session->set_flashdata('user_email',$data['email']);
					$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Please eneter correct email!</div>');
					return redirect("welcome/login");
				}

			}
			else
			{
			$this->session->set_flashdata('errorMessage','<div class="alert alert-danger">Please fill the form!</div>');
			return redirect("welcome/login");
			}

		}
		else
		{
			return redirect('Welcome');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('logout','<div class="alert alert-success">Logout!</div>');
		return redirect('Welcome');
	}
	private function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
