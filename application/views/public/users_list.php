
<?php include('public_header.php');?>
<br>
<br>
<h1>All Users</h1>
<hr>
<table class="table">
<thead>
<th>SR No.</th>
<th>Username</th>
<th>Email</th>
<th>Credits</th>
</thead>
<tbody>
<tr>
<?php if(count($users)): ?>
<?php $count=$this->uri->segment(3,0); ?>
<?php foreach($users as $users): ?>
<td><?= ++$count ?></td>
<td><?= anchor("user/select_users/{$users->ID}",$users->Name) ?></td>
<td><?= $users->Email ?></td>
<td><?= $users->Credits ?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="3">No Records Found</td>
</tr>
<?php endif;?>
</tbody>
</table>
<?= $this->pagination->create_links(); ?>
</div>


<?php include('public_footer.php');?>
