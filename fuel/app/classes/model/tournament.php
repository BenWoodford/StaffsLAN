<?php
class Model_Tournament extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'schedule_item_id',
		'tournament_title',
		'tournament_description',
		'binarybeast_id',
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
		$val->add_field('schedule_item_id', 'Schedule Item Id', 'required|valid_string[numeric]');
		$val->add_field('tournament_title', 'Tournament Title', 'required|max_length[255]');
		$val->add_field('tournament_description', 'Tournament Description', 'required');
		$val->add_field('binarybeast_id', 'Binarybeast Id', 'required|valid_string[numeric]');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');

		return $val;
	}

}
