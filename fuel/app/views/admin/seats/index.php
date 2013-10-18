<h2>Listing Seats</h2>
<br>
<?php if ($seats): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Seat id</th>
			<th>Block id</th>
			<th>Seat num</th>
			<th>Seat locx</th>
			<th>Seat locy</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($seats as $item): ?>		<tr>

			<td><?php echo $item->seat_id; ?></td>
			<td><?php echo $item->block_id; ?></td>
			<td><?php echo $item->seat_num; ?></td>
			<td><?php echo $item->seat_locx; ?></td>
			<td><?php echo $item->seat_locy; ?></td>
			<td>
				<?php echo Html::anchor('admin/seats/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/seats/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/seats/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Seats.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/seats/create', 'Add new Seat', array('class' => 'btn btn-success')); ?>

</p>
