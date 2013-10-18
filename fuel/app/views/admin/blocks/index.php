<h2>Listing Blocks</h2>
<br>
<?php if ($blocks): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Block id</th>
			<th>Block name</th>
			<th>Room id</th>
			<th>Block shorthand</th>
			<th>Block locx</th>
			<th>Block locy</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($blocks as $item): ?>		<tr>

			<td><?php echo $item->block_id; ?></td>
			<td><?php echo $item->block_name; ?></td>
			<td><?php echo $item->room_id; ?></td>
			<td><?php echo $item->block_shorthand; ?></td>
			<td><?php echo $item->block_locx; ?></td>
			<td><?php echo $item->block_locy; ?></td>
			<td>
				<?php echo Html::anchor('admin/blocks/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/blocks/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/blocks/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Blocks.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/blocks/create', 'Add new Block', array('class' => 'btn btn-success')); ?>

</p>
