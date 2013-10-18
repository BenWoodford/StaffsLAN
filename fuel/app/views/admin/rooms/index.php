<h2>Listing Rooms</h2>
<br>
<?php if ($rooms): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Room id</th>
			<th>Room name</th>
			<th>Lan id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($rooms as $item): ?>		<tr>

			<td><?php echo $item->room_id; ?></td>
			<td><?php echo $item->room_name; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/rooms/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/rooms/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/rooms/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rooms.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/rooms/create', 'Add new Room', array('class' => 'btn btn-success')); ?>

</p>
