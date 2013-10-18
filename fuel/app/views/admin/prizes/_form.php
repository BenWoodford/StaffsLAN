<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Prize id', 'prize_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('prize_id', Input::post('prize_id', isset($prize) ? $prize->prize_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prize id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tournament id', 'tournament_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('tournament_id', Input::post('tournament_id', isset($prize) ? $prize->tournament_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tournament id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prize title', 'prize_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('prize_title', Input::post('prize_title', isset($prize) ? $prize->prize_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prize title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prize order', 'prize_order', array('class'=>'control-label')); ?>

				<?php echo Form::input('prize_order', Input::post('prize_order', isset($prize) ? $prize->prize_order : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prize order')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prize how', 'prize_how', array('class'=>'control-label')); ?>

				<?php echo Form::input('prize_how', Input::post('prize_how', isset($prize) ? $prize->prize_how : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prize how')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>