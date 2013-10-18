<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Inout id', 'inout_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('inout_id', Input::post('inout_id', isset($inout) ? $inout->inout_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Inout id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($inout) ? $inout->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Inout time', 'inout_time', array('class'=>'control-label')); ?>

				<?php echo Form::input('inout_time', Input::post('inout_time', isset($inout) ? $inout->inout_time : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Inout time')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($inout) ? $inout->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>