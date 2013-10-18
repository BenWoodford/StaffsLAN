<h2>Editing Team</h2>
<br>

<?php echo render('admin/teams/_form'); ?>
<p>
	<?php echo Html::anchor('admin/teams/view/'.$team->id, 'View'); ?> |
	<?php echo Html::anchor('admin/teams', 'Back'); ?></p>
