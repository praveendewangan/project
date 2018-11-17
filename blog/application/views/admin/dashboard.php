<?php include('admin_header.php');?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-6 ">
			<!-- <a href="" class="btn btn-info pull-right">
				Add Article
			</a> -->
			<?= anchor('admin/add_article','Add Article',['class'=>'btn btn-info pull-right']);?>
		</div>
	</div>
	  <?php if($feedback = $this->session->flashdata('feedback')):?>
	  <div class="row">
	  	<div class="col-lg-6">
	  		<div class="alert alert-dismissible <?= $this->session->flashdata('feedback_class');?>">
  <strong></strong>  <?= $feedback;?>
</div>
	  	</div>
	  </div>
	<?php endif;?>
	<table class="table">
		<thead>
			<th>Sr.No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead> 
		<tbody>
			<?php  //$i= 1+$this->uri->segment(3) | 0;
			$i= $this->uri->segment(3,0);
			if(count($articles)):
				foreach($articles as $article):?>
			<tr>
				<td><?= ++$i;?></td>
				<td><?php echo $article->title;?></td>
				<td>
					<div class="row">
						<div class="col-lg-2">
					<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']);?>
					<!-- <button class="btn btn-primary">Edit</button> --></div>
						<div class="col-lg-2">
					<?=
						form_open('admin/delete_article'),form_hidden('article_id',$article->id),
							form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
							form_close();
					?>
					<!-- <button class="btn btn-danger">Delete</button> --></div>
					</div>
				</td>
			</tr>
		<?php 	
				endforeach;
			else:?>
				<td colspan="3">No records found!</td>
				<?php 
			endif;
				?>
		</tbody>
	</table>
	<?php echo  $this->pagination->create_links();?>
</div>
<?php include('admin_footer.php');?>