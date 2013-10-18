<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Item id', 'item_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('item_id', Input::post('item_id', isset($item) ? $item->item_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Item id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Block id', 'block_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('block_id', Input::post('block_id', isset($item) ? $item->block_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Block id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Item description', 'item_description', array('class'=>'control-label')); ?>

				<?php echo Form::input('item_description', Input::post('item_description', isset($item) ? $item->item_description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Item description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Item quantity', 'item_quantity', array('class'=>'control-label')); ?>

				<?php echo Form::input('item_quantity', Input::post('item_quantity', isset($item) ? $item->item_quantity : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Item quantity')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>