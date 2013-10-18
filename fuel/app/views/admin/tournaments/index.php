<h2>Listing Tournaments</h2>
<br>
<?php if ($tournaments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Tournament id</th>
			<th>Schedule item id</th>
			<th>Tournament title</th>
			<th>Tournament description</th>
			<th>Binarybeast id</th>
			<th>Lan id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($tournaments as $item): ?>		<tr>

			<td><?php echo $item->tournament_id; ?></td>
			<td><?php echo $item->schedule_item_id; ?></td>
			<td><?php echo $item->tournament_title; ?></td>
			<td><?php echo $item->tournament_description; ?></td>
			<td><?php echo $item->binarybeast_id; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/tournaments/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/tournaments/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/tournaments/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Tournaments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/tournaments/create', 'Add new Tournament', array('class' => 'btn btn-success')); ?>

</p>
