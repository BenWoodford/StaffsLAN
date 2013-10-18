<h2>Editing Seat</h2>
<br>

<?php echo render('admin/seats/_form'); ?>
<p>
	<?php echo Html::anchor('admin/seats/view/'.$seat->id, 'View'); ?> |
	<?php echo Html::anchor('admin/seats', 'Back'); ?></p>
