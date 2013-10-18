<?php
class Model_Inout extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'inout_id',
		'user_id',
		'inout_time',
		'lan_id',
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

}
