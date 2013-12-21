<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'default' => array(
		'connection' => array(
			'dsn' => 'mysql:host=' . getenv('FUEL_DBHOST') . ';dbname=' . getenv('FUEL_DBNAME'),
			'username' => getenv('FUEL_DBUSER'),
			'password' => getenv('FUEL_DBPASS')
		)
	)
);
