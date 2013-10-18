<?php
class Model_Room extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'room_name',
		'lan_id',
		'room_height',
		'room_width',
		'room_locx',
		'room_locy',
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
		$val->add_field('room_name', 'Room Name', 'required|max_length[32]');
		$val->add_field('lan_id', 'LAN ID', 'required|valid_string[numeric]');
		$val->add_field('room_locx', 'Room X', 'required|valid_string[numeric]');
		$val->add_field('room_locy', 'Room Y', 'required|valid_string[numeric]');
		$val->add_field('room_height', 'Room Height', 'required|valid_string[numeric]');
		$val->add_field('room_width', 'Room Width', 'required|valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'lan' => array(
	        'key_from' => 'lan_id',
	        'model_to' => 'Model_Lan',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
    );

	protected static $_has_many = array(
	    'blocks' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Block',
	        'key_to' => 'room_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
}
