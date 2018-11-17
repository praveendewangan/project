<?php include('public_header.php');?>

<div class="container">
	<h1>Search Results</h1>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<td>Sr.No.</td>
				<td>Article Title</td>
				<td>Published on</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php if(count($articles)):
					$count = $this->uri->segment(4,0);
					foreach($articles as $article):?>
				<td><?= ++$count;?></td>
				<td><?= $article->title;?></td>
				<td><?= 'Date'?></td>
			</tr>
				<?php endforeach;
				else:?>
			<tr>
				<td colspan="3">No records found.</td>	
				<?php endif; ?>
			</tr> 
			</tbody>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('public_footer.php');?>
