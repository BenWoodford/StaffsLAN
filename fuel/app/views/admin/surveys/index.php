<h2>Listing Surveys</h2>
<br>
<?php if ($surveys): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Survey id</th>
			<th>Survey title</th>
			<th>Lan id</th>
			<th>Survey description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($surveys as $item): ?>		<tr>

			<td><?php echo $item->survey_id; ?></td>
			<td><?php echo $item->survey_title; ?></td>
			<td><?php echo $item->lan_id; ?></td>
			<td><?php echo $item->survey_description; ?></td>
			<td>
				<?php echo Html::anchor('admin/surveys/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/surveys/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/surveys/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Surveys.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/surveys/create', 'Add new Survey', array('class' => 'btn btn-success')); ?>

</p>
