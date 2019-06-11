<?php include('public_header.php');?>
<?php echo form_open_multipart('user/transfer',['class'=>'container']);?>
<?php echo form_hidden('id',$this->session->userdata('ID')); ?>
<div class="container">
<h1>
<?= $user->Name ?>
</h1>

<?= $user->Email;?>

<br>
<hr>
<p>Credit points:&nbsp
<?= $user->Credits ?>
</p>
</div>
<br>
<br>
<p style="text-align:center">Enter User 2 to transfer Credit from User 1 to User 2</p>
<br>
<form >
  <fieldset>
  <div class="row">
	<div class="col-lg-6">
    <div class="form-group">
      <label for="exampleSelect1">ENTER USER 2</label>
	  <div class="col-lg-10">
     <?php echo form_input(['name'=>'name','class'=>'form-control','placeholder'=>'User 2 name','value'=>set_value('name')])?>
    </div>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
      <label for="exampleInputPassword1">Enter Credit Points to transfer</label>
	   <div class="col-lg-10">
      <?php echo form_input(['name'=>'amount','class'=>'form-control','placeholder'=>'Credit points','value'=>set_value('amount')])?>
    </div>
	 </div>
	  </div>
	</div>
   <?= form_input(['class'=>'btn btn-lg btn-primary float-sm-right', 'type'=>'submit', 'value'=>'Transfer']) ?>
		
  </fieldset>
</form>
<?php include('public_footer.php');?>