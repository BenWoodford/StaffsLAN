<h2>Viewing #<?php echo $inout->id; ?></h2>

<p>
	<strong>Inout id:</strong>
	<?php echo $inout->inout_id; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $inout->user_id; ?></p>
<p>
	<strong>Inout time:</strong>
	<?php echo $inout->inout_time; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $inout->lan_id; ?></p>

<?php echo Html::anchor('admin/inouts/edit/'.$inout->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/inouts', 'Back'); ?>