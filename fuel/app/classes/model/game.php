<?php
class Model_Game extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'game_title',
		'game_image',
		'steam_appid',
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
		$val->add_field('game_title', 'Game Title', 'required|max_length[255]');
		$val->add_field('game_image', 'Game Image', 'required');
		$val->add_field('steam_appid', 'Steam Appid', 'required|valid_string[numeric]');

		return $val;
	}

}
