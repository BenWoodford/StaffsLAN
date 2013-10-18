<h2>Editing Prize</h2>
<br>

<?php echo render('admin/prizes/_form'); ?>
<p>
	<?php echo Html::anchor('admin/prizes/view/'.$prize->id, 'View'); ?> |
	<?php echo Html::anchor('admin/prizes', 'Back'); ?></p>
