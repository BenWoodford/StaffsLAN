<?php
return array(
	'_root_'  => 'home/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	'map' => array('map/index', 'name' => 'map'),	
	'auth/go' => array('auth/go', 'name' => 'go'),
	'auth/callback' => array('auth/callback', 'name' => 'callback'),
);