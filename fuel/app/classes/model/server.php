<?php
class Model_Server extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'server_title',
		'server_host',
		'server_port',
		'server_type',
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
		$val->add_field('server_title', 'Server Title', 'required|max_length[255]');
		$val->add_field('server_host', 'Server Host', 'required|max_length[64]');
		$val->add_field('server_port', 'Server Port', 'required|valid_string[numeric]');
		$val->add_field('server_type', 'Server Type', 'required|max_length[24]');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');

		return $val;
	}

}
