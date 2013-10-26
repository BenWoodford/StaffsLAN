<?php

class Model_Answer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'question_id',
		'user_id',
		'value',
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
	protected static $_table_name = 'answers';

	protected static $_has_one = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
		'question' => array(
			'key_from' => 'question_id',
			'model_to' => 'Model_Question',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);

}
