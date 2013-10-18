<h2>Viewing #<?php echo $tournament->id; ?></h2>

<p>
	<strong>Tournament id:</strong>
	<?php echo $tournament->tournament_id; ?></p>
<p>
	<strong>Schedule item id:</strong>
	<?php echo $tournament->schedule_item_id; ?></p>
<p>
	<strong>Tournament title:</strong>
	<?php echo $tournament->tournament_title; ?></p>
<p>
	<strong>Tournament description:</strong>
	<?php echo $tournament->tournament_description; ?></p>
<p>
	<strong>Binarybeast id:</strong>
	<?php echo $tournament->binarybeast_id; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $tournament->lan_id; ?></p>

<?php echo Html::anchor('admin/tournaments/edit/'.$tournament->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/tournaments', 'Back'); ?>