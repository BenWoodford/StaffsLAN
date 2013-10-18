<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Game id', 'game_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('game_id', Input::post('game_id', isset($game) ? $game->game_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Game id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Game title', 'game_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('game_title', Input::post('game_title', isset($game) ? $game->game_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Game title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Game image', 'game_image', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('game_image', Input::post('game_image', isset($game) ? $game->game_image : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Game image')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Steam appid', 'steam_appid', array('class'=>'control-label')); ?>

				<?php echo Form::input('steam_appid', Input::post('steam_appid', isset($game) ? $game->steam_appid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Steam appid')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>