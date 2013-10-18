<h2>Editing Server</h2>
<br>

<?php echo render('admin/servers/_form'); ?>
<p>
	<?php echo Html::anchor('admin/servers/view/'.$server->id, 'View'); ?> |
	<?php echo Html::anchor('admin/servers', 'Back'); ?></p>
