<h2>Editing Schedule_item</h2>
<br>

<?php echo render('admin/schedule/items/_form'); ?>
<p>
	<?php echo Html::anchor('admin/schedule/items/view/'.$schedule_item->id, 'View'); ?> |
	<?php echo Html::anchor('admin/schedule/items', 'Back'); ?></p>
