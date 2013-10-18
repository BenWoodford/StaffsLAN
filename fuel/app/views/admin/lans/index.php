<h2>Listing Lans</h2>
<br>
<?php if ($lans): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Lan id</th>
			<th>Lan start</th>
			<th>Lan end</th>
			<th>Lan title</th>
			<th>Lan description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($lans as $item): ?>		<tr>

			<td><?php echo $item->lan_id; ?></td>
			<td><?php echo $item->lan_start; ?></td>
			<td><?php echo $item->lan_end; ?></td>
			<td><?php echo $item->lan_title; ?></td>
			<td><?php echo $item->lan_description; ?></td>
			<td>
				<?php echo Html::anchor('admin/lans/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/lans/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/lans/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Lans.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/lans/create', 'Add new Lan', array('class' => 'btn btn-success')); ?>

</p>
