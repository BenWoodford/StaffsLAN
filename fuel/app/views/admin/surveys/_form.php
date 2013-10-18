<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Survey id', 'survey_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_id', Input::post('survey_id', isset($survey) ? $survey->survey_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey title', 'survey_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('survey_title', Input::post('survey_title', isset($survey) ? $survey->survey_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Survey title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($survey) ? $survey->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Survey description', 'survey_description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('survey_description', Input::post('survey_description', isset($survey) ? $survey->survey_description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Survey description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>