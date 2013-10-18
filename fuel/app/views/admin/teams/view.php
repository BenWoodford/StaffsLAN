<h2>Viewing #<?php echo $team->id; ?></h2>

<p>
	<strong>Team id:</strong>
	<?php echo $team->team_id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $team->name; ?></p>
<p>
	<strong>Tournament id:</strong>
	<?php echo $team->tournament_id; ?></p>

<?php echo Html::anchor('admin/teams/edit/'.$team->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/teams', 'Back'); ?>