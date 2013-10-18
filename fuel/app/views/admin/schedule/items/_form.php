<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Schedule item id', 'schedule_item_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('schedule_item_id', Input::post('schedule_item_id', isset($schedule_item) ? $schedule_item->schedule_item_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Schedule item id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Schedule item name', 'schedule_item_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('schedule_item_name', Input::post('schedule_item_name', isset($schedule_item) ? $schedule_item->schedule_item_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Schedule item name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Schedule item description', 'schedule_item_description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('schedule_item_description', Input::post('schedule_item_description', isset($schedule_item) ? $schedule_item->schedule_item_description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Schedule item description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Schedule item start', 'schedule_item_start', array('class'=>'control-label')); ?>

				<?php echo Form::input('schedule_item_start', Input::post('schedule_item_start', isset($schedule_item) ? $schedule_item->schedule_item_start : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Schedule item start')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Schedule item end', 'schedule_item_end', array('class'=>'control-label')); ?>

				<?php echo Form::input('schedule_item_end', Input::post('schedule_item_end', isset($schedule_item) ? $schedule_item->schedule_item_end : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Schedule item end')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($schedule_item) ? $schedule_item->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>