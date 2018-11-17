<?php include('public_header.php');?>

<div class="container">
	<?php echo form_open('login/admin_login',['class'=>'form-horizontal']);?>
	  <?php echo form_fieldset('Admin Login');?>
	  <?php if($error = $this->session->flashdata('login_failed')):?>
	  <div class="row">
	  	<div class="col-lg-6">
	  		<div class="alert alert-dismissible alert-danger">
  <strong>Error!</strong>  <?= $error;?>
</div>
	  	</div>
	  </div>
	<?php endif;?>

	    <div class="row">
	    	<div class="col-lg-6">
			    <div class="form-group">
			      <?php echo form_label('Username','exampleInputEmail1');?>
			      <?php echo form_input(['type'=>'text','name'=>'username','class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>'emailHelp','placeholder'=>'Enter username','value'=>html_escape(set_value('username'))]);?>
			    </div>
	    	</div>
		    	<div class="col-lg-6">
			      <?php echo form_error('username');?>
			      <!-- <?php //echo form_error('username','<span class="text-danger">','</span>');?> -->
		    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-6">
			    <div class="form-group">
			      <?php echo form_label('Password','exampleInputPassword1');?>
			      <?php echo form_password(['class'=>'form-control','name'=>'password','id'=>'exampleInputPassword1','placeholder'=>'Enter Password']);?>
			    </div>
			</div>
		    	<div class="col-lg-6">
			      <?php echo form_error('password');?>
		    	</div>
	    </div>
	    <?php $cancle_data = array('type'=>'reset','class'=>'btn btn-default','content'=>'Cancle');
	    echo form_button($cancle_data);?>
	    <?php $submit_data = array('name'=>'submit','class'=>'btn btn-primary','value'=>'Submit');
	    echo form_submit($submit_data);?>
	  <?php echo form_fieldset_close();?>
	<?php echo form_close();?>
</div>
<?php include('public_footer.php');?>
