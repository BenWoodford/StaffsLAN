<h2>Listing Schedule_items</h2>
<br>
<?php if ($schedule_items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Schedule item id</th>
			<th>Schedule item name</th>
			<th>Schedule item description</th>
			<th>Schedule item start</th>
			<th>Schedule item end</th>
			<th>Lan id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($schedule_items as $item): ?>		<tr>

			<td><?php echo $item->schedule_item_id; ?></td>
			<td><?php echo $item->schedule_item_name; ?></td>
			<td><?php echo $item->schedule_item_description; ?></td>
			<td><?php echo $item->schedule_item_start; ?></td>
			<td><?php echo $item->schedule_item_end; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/schedule/items/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/schedule/items/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/schedule/items/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Schedule_items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/schedule/items/create', 'Add new Schedule item', array('class' => 'btn btn-success')); ?>

</p>
