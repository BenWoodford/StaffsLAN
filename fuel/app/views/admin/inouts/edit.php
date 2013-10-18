<h2>Editing Inout</h2>
<br>

<?php echo render('admin/inouts/_form'); ?>
<p>
	<?php echo Html::anchor('admin/inouts/view/'.$inout->id, 'View'); ?> |
	<?php echo Html::anchor('admin/inouts', 'Back'); ?></p>
