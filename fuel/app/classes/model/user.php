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

	public function hasTicket() {
		return Model_Ticket::userHasTicket(Model_Lan::nextLAN()->id, $this->student_number);
	}

	public function getTicket() {
		return Model_Ticket::query()->where(array(array('student_number' => $this->student_number), array('lan_id' => Model_Lan::nextLAN()->id)))->get_one();
	}

	public function hasSeat() {
		return Model_Seat::query()
		->related("block")
		->related("block.room")
		->related("block.room.lan")
		->where(array(array("block.room.lan.id" => Model_Lan::nextLAN()->id), array('user_id' => $this->id)))
		->count() > 0;

		//return Model_Seat::query()->where(array(array('lan_id' => Model_Lan::nextLAN()->id), array('user_id' => $this->id)))->count() > 0;
	}

	public function hasCheckedIn() {
		return Model_Survey::find(1)->userHasCompleted($this->id);
	}

	public function isVolunteer() {
		if(!$this->hasTicket())
			return false;

		return $this->getTicket()->is_volunteer == 1;
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

		/*if(Config::load('custom')['debug'] && $current == null) {
			$current = Model_User::find('first');
			echo "five";
		}*/

		return $current;
	}

	public function lastSignIn() {
		$lan = Model_Lan::nextLAN();
		$inout = Model_Inout::find('last', array(
			'where' => array(
				array('user_id' => $this->id)
			),
			'order_by' => array('inout_time' => 'desc')
		));

		if(!$inout)
			return false;

		return $inout;
	}
}
