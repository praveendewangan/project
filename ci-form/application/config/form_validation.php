<?php

$config = [

			'register' => [
									[
									'field' => 'name',
									'label' => 'Name',
									'rules' => 'required|trim|max_length[20]'
									],
									[
									'field' => 'email',
									'label' => 'Email',
									'rules' => 'required|trim'
									],
									[
									'field' => 'mobile',
									'label' => 'Mobile',
									'rules' => 'required|trim|max_length[10]'
									],
									[
									'field' => 'password',
									'label' => 'Password',
									'rules' => 'required|trim|min_length[5]'
									],
									[
									'field' => 'confirm_password',
									'label' => 'Confirm Password',
									'rules' => 'required|trim|min_length[5]'
									],
									[
									'field' => 'userfile',
									'label' => 'User file',
									'rules' => 'required'
									]
								   ],
			'admin_login' => [
								[
									'field' => 'username',
									'label' => 'User Name',
									'rules' => 'required|alpha|trim'
								],
								[
									'field' => 'password',
									'label' => 'Password',
									'rules' => 'required'
								]
			]
]

?>