<h2>Viewing #<?php echo $question->id; ?></h2>

<p>
	<strong>Question id:</strong>
	<?php echo $question->question_id; ?></p>
<p>
	<strong>Survey id:</strong>
	<?php echo $question->survey_id; ?></p>
<p>
	<strong>Survey text:</strong>
	<?php echo $question->survey_text; ?></p>
<p>
	<strong>Survey type:</strong>
	<?php echo $question->survey_type; ?></p>
<p>
	<strong>Data:</strong>
	<?php echo $question->data; ?></p>

<?php echo Html::anchor('admin/questions/edit/'.$question->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/questions', 'Back'); ?>