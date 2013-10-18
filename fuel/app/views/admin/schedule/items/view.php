<h2>Viewing #<?php echo $schedule_item->id; ?></h2>

<p>
	<strong>Schedule item id:</strong>
	<?php echo $schedule_item->schedule_item_id; ?></p>
<p>
	<strong>Schedule item name:</strong>
	<?php echo $schedule_item->schedule_item_name; ?></p>
<p>
	<strong>Schedule item description:</strong>
	<?php echo $schedule_item->schedule_item_description; ?></p>
<p>
	<strong>Schedule item start:</strong>
	<?php echo $schedule_item->schedule_item_start; ?></p>
<p>
	<strong>Schedule item end:</strong>
	<?php echo $schedule_item->schedule_item_end; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $schedule_item->lan_id; ?></p>

<?php echo Html::anchor('admin/schedule/items/edit/'.$schedule_item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/schedule/items', 'Back'); ?>