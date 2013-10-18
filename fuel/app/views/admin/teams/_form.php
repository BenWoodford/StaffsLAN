<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Team id', 'team_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('team_id', Input::post('team_id', isset($team) ? $team->team_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Team id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($team) ? $team->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tournament id', 'tournament_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('tournament_id', Input::post('tournament_id', isset($team) ? $team->tournament_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tournament id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>