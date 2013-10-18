<h2>Listing Servers</h2>
<br>
<?php if ($servers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Server id</th>
			<th>Server title</th>
			<th>Server host</th>
			<th>Server port</th>
			<th>Server type</th>
			<th>Lan id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($servers as $item): ?>		<tr>

			<td><?php echo $item->server_id; ?></td>
			<td><?php echo $item->server_title; ?></td>
			<td><?php echo $item->server_host; ?></td>
			<td><?php echo $item->server_port; ?></td>
			<td><?php echo $item->server_type; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/servers/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/servers/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/servers/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Servers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/servers/create', 'Add new Server', array('class' => 'btn btn-success')); ?>

</p>
