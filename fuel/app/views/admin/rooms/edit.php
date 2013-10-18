<h2>Editing Room</h2>
<br>

<?php echo render('admin/rooms/_form'); ?>
<p>
	<?php echo Html::anchor('admin/rooms/view/'.$room->id, 'View'); ?> |
	<?php echo Html::anchor('admin/rooms', 'Back'); ?></p>
