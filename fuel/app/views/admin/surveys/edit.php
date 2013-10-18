<h2>Editing Survey</h2>
<br>

<?php echo render('admin/surveys/_form'); ?>
<p>
	<?php echo Html::anchor('admin/surveys/view/'.$survey->id, 'View'); ?> |
	<?php echo Html::anchor('admin/surveys', 'Back'); ?></p>
