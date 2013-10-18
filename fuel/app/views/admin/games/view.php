<h2>Viewing #<?php echo $game->id; ?></h2>

<p>
	<strong>Game id:</strong>
	<?php echo $game->game_id; ?></p>
<p>
	<strong>Game title:</strong>
	<?php echo $game->game_title; ?></p>
<p>
	<strong>Game image:</strong>
	<?php echo $game->game_image; ?></p>
<p>
	<strong>Steam appid:</strong>
	<?php echo $game->steam_appid; ?></p>

<?php echo Html::anchor('admin/games/edit/'.$game->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/games', 'Back'); ?>