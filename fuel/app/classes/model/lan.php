<?php
class Model_Lan extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'lan_start',
		'lan_end',
		'lan_title',
		'lan_description',
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
		$val->add_field('lan_start', 'Lan Start', 'required');
		$val->add_field('lan_end', 'Lan End', 'required');
		$val->add_field('lan_title', 'Lan Title', 'required|max_length[50]');
		$val->add_field('lan_description', 'Lan Description', 'required');

		return $val;
	}

	public static function nextLAN() {
		$nextlan = Model_Lan::find('first', array(
				'where' => array(
					array('lan_end', '>', time()),
				),
				'order_by' => array('lan_end' => 'asc'),
			)
		);

		if(!$nextlan) {
			$nextlan = Model_Lan::find('first', array(
					'where' => array(
						array('lan_end', '<', time())
					),
					'order_by' => array('lan_end' => 'desc'),
				)
			);
		}

		return $nextlan;
	}

	protected static $_has_many = array(
	    'rooms' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Room',
	        'key_to' => 'lan_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

}
