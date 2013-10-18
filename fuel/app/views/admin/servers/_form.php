<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Server id', 'server_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_id', Input::post('server_id', isset($server) ? $server->server_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Server title', 'server_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_title', Input::post('server_title', isset($server) ? $server->server_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Server host', 'server_host', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_host', Input::post('server_host', isset($server) ? $server->server_host : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server host')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Server port', 'server_port', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_port', Input::post('server_port', isset($server) ? $server->server_port : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server port')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Server type', 'server_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_type', Input::post('server_type', isset($server) ? $server->server_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Lan id', 'lan_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('lan_id', Input::post('lan_id', isset($server) ? $server->lan_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Lan id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>