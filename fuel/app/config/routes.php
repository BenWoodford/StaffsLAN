<?php
return array(
	'_root_'  => 'home/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'map' => 'map',
	'auth/go' => 'auth/go',
	'auth/callback' => array('auth/callback', 'name' => 'callback'),
	'survey' => 'survey',
);