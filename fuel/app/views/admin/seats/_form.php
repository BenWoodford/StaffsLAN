<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Seat id', 'seat_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('seat_id', Input::post('seat_id', isset($seat) ? $seat->seat_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Seat id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block id', 'block_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_id', Input::post('block_id', isset($seat) ? $seat->block_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Seat num', 'seat_num', array('class'=>'control-label')); ?>

				<?php echo Form::input('seat_num', Input::post('seat_num', isset($seat) ? $seat->seat_num : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Seat num')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Seat locx', 'seat_locx', array('class'=>'control-label')); ?>

				<?php echo Form::input('seat_locx', Input::post('seat_locx', isset($seat) ? $seat->seat_locx : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Seat locx')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Seat locy', 'seat_locy', array('class'=>'control-label')); ?>

				<?php echo Form::input('seat_locy', Input::post('seat_locy', isset($seat) ? $seat->seat_locy : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Seat locy')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>