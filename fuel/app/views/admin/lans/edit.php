<h2>Editing Lan</h2>
<br>

<?php echo render('admin/lans/_form'); ?>
<p>
	<?php echo Html::anchor('admin/lans/view/'.$lan->id, 'View'); ?> |
	<?php echo Html::anchor('admin/lans', 'Back'); ?></p>
