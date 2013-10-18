<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Tournament id', 'tournament_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('tournament_id', Input::post('tournament_id', isset($tournament) ? $tournament->tournament_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tournament id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Schedule item id', 'schedule_item_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('schedule_item_id', Input::post('schedule_item_id', isset($tournament) ? $tournament->schedule_item_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Schedule item id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tournament title', 'tournament_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('tournament_title', Input::post('tournament_title', isset($tournament) ? $tournament->tournament_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tournament title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tournament description', 'tournament_description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('tournament_description', Input::post('tournament_description', isset($tournament) ? $tournament->tournament_description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Tournament description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Binarybeast id', 'binarybeast_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('binarybeast_id', Input::post('binarybeast_id', isset($tournament) ? $tournament->binarybeast_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Binarybeast id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($tournament) ? $tournament->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>