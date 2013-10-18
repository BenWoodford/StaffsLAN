<h2>Listing Prizes</h2>
<br>
<?php if ($prizes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Prize id</th>
			<th>Tournament id</th>
			<th>Prize title</th>
			<th>Prize order</th>
			<th>Prize how</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($prizes as $item): ?>		<tr>

			<td><?php echo $item->prize_id; ?></td>
			<td><?php echo $item->tournament_id; ?></td>
			<td><?php echo $item->prize_title; ?></td>
			<td><?php echo $item->prize_order; ?></td>
			<td><?php echo $item->prize_how; ?></td>
			<td>
				<?php echo Html::anchor('admin/prizes/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/prizes/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/prizes/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Prizes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/prizes/create', 'Add new Prize', array('class' => 'btn btn-success')); ?>

</p>
