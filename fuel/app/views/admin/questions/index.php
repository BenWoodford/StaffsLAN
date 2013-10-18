<h2>Listing Questions</h2>
<br>
<?php if ($questions): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Question id</th>
			<th>Survey id</th>
			<th>Survey text</th>
			<th>Survey type</th>
			<th>Data</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($questions as $item): ?>		<tr>

			<td><?php echo $item->question_id; ?></td>
			<td><?php echo $item->survey_id; ?></td>
			<td><?php echo $item->survey_text; ?></td>
			<td><?php echo $item->survey_type; ?></td>
			<td><?php echo $item->data; ?></td>
			<td>
				<?php echo Html::anchor('admin/questions/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/questions/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/questions/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Questions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/questions/create', 'Add new Question', array('class' => 'btn btn-success')); ?>

</p>
