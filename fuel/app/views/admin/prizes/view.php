<h2>Viewing #<?php echo $prize->id; ?></h2>

<p>
	<strong>Prize id:</strong>
	<?php echo $prize->prize_id; ?></p>
<p>
	<strong>Tournament id:</strong>
	<?php echo $prize->tournament_id; ?></p>
<p>
	<strong>Prize title:</strong>
	<?php echo $prize->prize_title; ?></p>
<p>
	<strong>Prize order:</strong>
	<?php echo $prize->prize_order; ?></p>
<p>
	<strong>Prize how:</strong>
	<?php echo $prize->prize_how; ?></p>

<?php echo Html::anchor('admin/prizes/edit/'.$prize->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/prizes', 'Back'); ?>