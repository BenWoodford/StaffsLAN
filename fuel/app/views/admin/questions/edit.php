<h2>Editing Question</h2>
<br>

<?php echo render('admin/questions/_form'); ?>
<p>
	<?php echo Html::anchor('admin/questions/view/'.$question->id, 'View'); ?> |
	<?php echo Html::anchor('admin/questions', 'Back'); ?></p>
