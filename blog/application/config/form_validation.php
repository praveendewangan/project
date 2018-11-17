<?php

$config = [

			'add_article_rules' => [
									[
									'field' => 'title',
									'label' => 'Title',
									'rules' => 'required|trim'
									],
									[
									'field' => 'body',
									'label' => 'Article Title',
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