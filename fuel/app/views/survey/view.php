<div class="box">
	<div class="box-header">
		<h2>
			<i class="icon-th-list"></i>
			<?=$survey->survey_title;?>
		</h2>
	</div>
	<div class="box-content">
		<?=$survey->survey_description;?>
	</div>
</div>

<?php echo Form::open(); ?>

<?php echo Form::hidden('survey-id', $survey->id); ?>

<?php foreach($survey->questiongroups as $group) { ?>
	<div class="box" id="questiongroup-<?=$group->id;?>">
		<div class="box-header">
			<h2>
				<i class="icon-th-list"></i>
				<?=$group->group_name;?>
			</h2>
		</div>
		<div class="box-content">
		<?php foreach($group->questions as $question) { ?>
		<div class="form-group">
		<?php
			switch($question->survey_type) {
				case 'text':
				case 'number':
				case 'tel':
				case 'email':
					echo '<label for="question' . $question->id . '">' . $question->survey_text . '</label>';
					echo Form::input($question->id, null, array('class' => 'form-control', 'id' => 'question' . $question->id, 'type' => $question->survey_type));
					break;
				case 'checkbox':
					echo '<label>';
					echo Form::checkbox($question->id, null, null, array());
					echo ' ' . $question->survey_text . '</label>';
					break;
				case 'info':
					echo '<span class="survey-text">' . $question->survey_text . '</span>';
					break;
				case 'textarea':
					echo '<label>' . $question->survey_text . '</label>';
					echo Form::textarea($question->id, null, array('class' => 'form-control'));
					break;
			}
		?>
		</div>
		<?php } ?>
		</div>
	</div>
<?php } ?>

<div class="box">
	<div class="box-header">
		<h2>
			<i class="icon-th-list"></i>
			Controls
		</h2>
	</div>
	<div class="box-content text-center">
		<?php echo Form::submit("submit", "Save", array('class' => 'btn btn-success')); ?>
		<?php echo Form::reset("reset", "Reset", array('class' => 'btn')); ?>
	</div>
</div>

<?php echo Form::close(); ?>