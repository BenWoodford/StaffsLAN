<h2>Listing Teams</h2>
<br>
<?php if ($teams): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Team id</th>
			<th>Name</th>
			<th>Tournament id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($teams as $item): ?>		<tr>

			<td><?php echo $item->team_id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->tournament_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/teams/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/teams/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/teams/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Teams.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/teams/create', 'Add new Team', array('class' => 'btn btn-success')); ?>

</p>
