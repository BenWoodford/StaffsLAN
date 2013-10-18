<h2>Viewing #<?php echo $room->id; ?></h2>

<p>
	<strong>Room id:</strong>
	<?php echo $room->room_id; ?></p>
<p>
	<strong>Room name:</strong>
	<?php echo $room->room_name; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $room->lan_id; ?></p>

<?php echo Html::anchor('admin/rooms/edit/'.$room->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/rooms', 'Back'); ?>