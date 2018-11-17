<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $data['title'];?></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/bootstrap.min.css">
	<style type="text/css" src="<?=base_url();?>assets/js/bootstrap.min.js"></style>
	<style type="text/css" src="<?=base_url();?>assets/js/jquery-3.3.1.min.js"></style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Login Form Webpage</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor02">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <?php if(!$this->session->userdata('username'))
	     		 {
	      	?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('Welcome/login');?>">Login</a>
	      </li>
	      <?php
				  }
				  else
				  {
	  ?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('Welcome/logout');?>">Logout</a>
	      </li>

	<?php }?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?=base_url('Welcome/register');?>">Register</a>
	      </li>
	    </ul>
	  </div>
	</nav>
		<?php echo $this->session->flashdata('login');?>
		<?php echo $this->session->flashdata('logout');?>
	<div class="container mt-4">
<!-- Load content page -->
	<?php if(isset($content) && isset($data))
			{
				$this->load->view($content,$data);
			}
	?>
	</div>
</body>
</html>