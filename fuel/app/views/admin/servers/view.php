<h2>Viewing #<?php echo $server->id; ?></h2>

<p>
	<strong>Server id:</strong>
	<?php echo $server->server_id; ?></p>
<p>
	<strong>Server title:</strong>
	<?php echo $server->server_title; ?></p>
<p>
	<strong>Server host:</strong>
	<?php echo $server->server_host; ?></p>
<p>
	<strong>Server port:</strong>
	<?php echo $server->server_port; ?></p>
<p>
	<strong>Server type:</strong>
	<?php echo $server->server_type; ?></p>
<p>
	<strong>Lan id:</strong>
	<?php echo $server->lan_id; ?></p>

<?php echo Html::anchor('admin/servers/edit/'.$server->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/servers', 'Back'); ?>