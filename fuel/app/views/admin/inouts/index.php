<h2>Listing Inouts</h2>
<br>
<?php if ($inouts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Inout id</th>
			<th>User id</th>
			<th>Inout time</th>
			<th>Lan id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($inouts as $item): ?>		<tr>

			<td><?php echo $item->inout_id; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->inout_time; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/inouts/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/inouts/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/inouts/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Inouts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/inouts/create', 'Add new Inout', array('class' => 'btn btn-success')); ?>

</p>
