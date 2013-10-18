<h2>Viewing #<?php echo $seat->id; ?></h2>

<p>
	<strong>Seat id:</strong>
	<?php echo $seat->seat_id; ?></p>
<p>
	<strong>Block id:</strong>
	<?php echo $seat->block_id; ?></p>
<p>
	<strong>Seat num:</strong>
	<?php echo $seat->seat_num; ?></p>
<p>
	<strong>Seat locx:</strong>
	<?php echo $seat->seat_locx; ?></p>
<p>
	<strong>Seat locy:</strong>
	<?php echo $seat->seat_locy; ?></p>

<?php echo Html::anchor('admin/seats/edit/'.$seat->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/seats', 'Back'); ?>