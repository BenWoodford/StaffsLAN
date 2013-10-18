<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Block id', 'block_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_id', Input::post('block_id', isset($block) ? $block->block_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block name', 'block_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_name', Input::post('block_name', isset($block) ? $block->block_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Room id', 'room_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('room_id', Input::post('room_id', isset($block) ? $block->room_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Room id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block shorthand', 'block_shorthand', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_shorthand', Input::post('block_shorthand', isset($block) ? $block->block_shorthand : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block shorthand')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block locx', 'block_locx', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_locx', Input::post('block_locx', isset($block) ? $block->block_locx : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block locx')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block locy', 'block_locy', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_locy', Input::post('block_locy', isset($block) ? $block->block_locy : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block locy')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>