<h2>Listing Games</h2>
<br>
<?php if ($games): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Game id</th>
			<th>Game title</th>
			<th>Game image</th>
			<th>Steam appid</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($games as $item): ?>		<tr>

			<td><?php echo $item->game_id; ?></td>
			<td><?php echo $item->game_title; ?></td>
			<td><?php echo $item->game_image; ?></td>
			<td><?php echo $item->steam_appid; ?></td>
			<td>
				<?php echo Html::anchor('admin/games/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/games/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/games/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Games.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/games/create', 'Add new Game', array('class' => 'btn btn-success')); ?>

</p>
