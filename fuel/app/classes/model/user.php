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

	public function hasSeat() {
		return Model_Seat::query()->where(array('lan_id' => Model_Lan::nextLAN()->id), array('user_id' => $this->id))->count() > 0;
	}

	public static function getCurrentUser() {
		$current = null;
		// Assign current_user to the instance so controllers can use it
		if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
		{
			$current = Auth::check() ? Model\Auth_User::find_by_username(Auth::get_screen_name()) : null;
		}
		else
		{
			$current = Auth::check() ? Model_User::find_by_username(Auth::get_screen_name()) : null;
		}

		if(Config::load('custom')['debug'] && $current == null) {
			$current = Model_User::find('first');
		}

		return $current;
	}
}
