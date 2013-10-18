<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Question id', 'question_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('question_id', Input::post('question_id', isset($question) ? $question->question_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Question id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey id', 'survey_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_id', Input::post('survey_id', isset($question) ? $question->survey_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey text', 'survey_text', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('survey_text', Input::post('survey_text', isset($question) ? $question->survey_text : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Survey text')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey type', 'survey_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_type', Input::post('survey_type', isset($question) ? $question->survey_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Data', 'data', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('data', Input::post('data', isset($question) ? $question->data : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Data')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>