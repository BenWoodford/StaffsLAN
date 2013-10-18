<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($lan) ? $lan->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan start', 'lan_start', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_start', Input::post('lan_start', isset($lan) ? $lan->lan_start : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan start')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan end', 'lan_end', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_end', Input::post('lan_end', isset($lan) ? $lan->lan_end : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan end')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan title', 'lan_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_title', Input::post('lan_title', isset($lan) ? $lan->lan_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan description', 'lan_description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('lan_description', Input::post('lan_description', isset($lan) ? $lan->lan_description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Lan description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>