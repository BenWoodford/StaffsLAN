<h2>Viewing #<?php echo $survey->id; ?></h2>

<p>
	<strong>Survey id:</strong>
	<?php echo $survey->survey_id; ?></p>
<p>
	<strong>Survey title:</strong>
	<?php echo $survey->survey_title; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $survey->lan_id; ?></p>
<p>
	<strong>Survey description:</strong>
	<?php echo $survey->survey_description; ?></p>

<?php echo Html::anchor('admin/surveys/edit/'.$survey->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/surveys', 'Back'); ?>