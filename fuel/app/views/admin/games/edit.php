<h2>Editing Game</h2>
<br>

<?php echo render('admin/games/_form'); ?>
<p>
	<?php echo Html::anchor('admin/games/view/'.$game->id, 'View'); ?> |
	<?php echo Html::anchor('admin/games', 'Back'); ?></p>
