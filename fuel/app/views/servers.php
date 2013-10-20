<div class="row" id="servers">
	<?php foreach($servers as $server) { ?>
	<div class="server box col-md-4 col-lg-3 col-sm-6 col-xs-12" id="server<?=$server->id;?>">
		<div class="box-header">
			<h2>
				<i class="icon-info"></i>
				<a href="<?=$server->printURI();?>"><?=$server->server_title;?></a>
			</h2>
		</div>
		<div class="box-content">
			<a href="<?=$server->printURI();?>">
			<?php
			if(!empty($server->game->steam_appid)) {
				echo '<img src="http://cdn3.steampowered.com/v/gfx/apps/' . $server->game->steam_appid . '/header.jpg" />';
			} elseif(!empty($server->game->game_image)) {
				echo '<img src="' . $server->game->game_image . '" />';
			}
			?>
			</a>
		</div>
	</div>
	<?php } ?>
</div>