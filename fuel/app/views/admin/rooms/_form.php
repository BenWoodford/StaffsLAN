<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Room id', 'room_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('room_id', Input::post('room_id', isset($room) ? $room->room_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Room id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Room name', 'room_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('room_name', Input::post('room_name', isset($room) ? $room->room_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Room name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($room) ? $room->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>