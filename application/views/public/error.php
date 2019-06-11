<?php include('public_header.php');?>
<?php echo form_open_multipart('user/transfer',['class'=>'container']);?>
<form>
<div class="col-lg-6">
	<?php echo form_error('name',"<p class='text-danger'>","</p>"); ?>
	</div>
<div class="col-lg-6">
	<?php echo form_error('amount',"<p class='text-danger'>","</p>"); ?>
	</div>
	</form>
	<?php include('public_footer.php');?>