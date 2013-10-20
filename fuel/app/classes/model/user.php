<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'steam',
		'student_number',
		'avatar_url',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'users';

	protected static $_has_many = array(
	    'tickets' => array(
	        'key_from' => 'student_number',
	        'model_to' => 'Model_Ticket',
	        'key_to' => 'student_number',
	        'cascade_save' => false,
	        'cascade_delete' => false,
	    )
	);
}
