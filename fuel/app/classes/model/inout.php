<?php
class Model_Inout extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'inout_time',
		'lan_id',
		'sign_type',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('inout_id', 'Inout Id', 'required|valid_string[numeric]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('inout_time', 'Inout Time', 'required');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');

		return $val;
	}

	public static function SignIn($uid) {
		Model_Inout::SignInOut($uid, 'in');
	}

	public static function SignOut($uid) {
		Model_Inout::SignInOut($uid, 'out');
	}

	public static function SignInOut($uid, $type) {
		$io = new Model_Inout(array('user_id' => $uid, 'inout_time' => time(), 'lan_id' => Model_Lan::nextLAN()->id, 'sign_type' => $type));
		$io->save();
	}
}
