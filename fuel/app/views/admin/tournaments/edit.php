<h2>Editing Tournament</h2>
<br>

<?php echo render('admin/tournaments/_form'); ?>
<p>
	<?php echo Html::anchor('admin/tournaments/view/'.$tournament->id, 'View'); ?> |
	<?php echo Html::anchor('admin/tournaments', 'Back'); ?></p>
