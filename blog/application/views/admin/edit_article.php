<?php include_once('admin_header.php');?>
<div class="container">
	<?php echo form_open("admin/update_article/{$article->id}",['class'=>'form-horizontal']);?>
	  <?php echo form_fieldset('Edit Article');?>

	    <div class="row">
	    	<div class="col-lg-6">
			    <div class="form-group">
			      <?php echo form_label('Article Title','exampleInputEmail1');?>
			      <?php echo form_input(['type'=>'text','name'=>'title','class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>'emailHelp','placeholder'=>'Enter title','value'=>html_escape(set_value('title',$article->title))]);?>
			    </div>
	    	</div>
		    	<div class="col-lg-6">
			      <?php echo form_error('title');?>
			      <!-- <?php //echo form_error('username','<span class="text-danger">','</span>');?> -->
		    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-6">
			    <div class="form-group">
			      <?php echo form_label('Article Body','exampleInputPassword1');?>
			      <?php echo form_textarea(['class'=>'form-control','name'=>'body','id'=>'exampleInputPassword1','placeholder'=>'Enter article body','value'=>html_escape(set_value('body',$article->body))]);?>
			    </div>
			</div>
		    	<div class="col-lg-6">
			      <?php echo form_error('body');?>
		    	</div>
	    </div>
	    <?php $cancle_data = array('type'=>'reset','class'=>'btn btn-default','content'=>'CANCLE');
	    echo form_button($cancle_data);?>
	    <?php $submit_data = array('name'=>'submit','class'=>'btn btn-primary','value'=>'SUBMIT');
	    echo form_submit($submit_data);?>
	  <?php echo form_fieldset_close();?>
	<?php echo form_close();?>
</div>
<?php include_once('admin_footer.php');?>