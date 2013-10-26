<?php
class Model_Question extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'questiongroup_id',
		'survey_text',
		'survey_type',
		'validation_rule',
		'data',
		'order',
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
		$val->add_field('questiongroup_id', 'Question Group Id', 'required|valid_string[numeric]');
		$val->add_field('survey_text', 'Survey Text', 'required');
		$val->add_field('survey_type', 'Survey Type', 'required|max_length[32]');
		$val->add_field('data', 'Data', 'required');
		$val->add_field('validation_rule', 'Validation Rule', 'required');
		$val->add_field('order', 'Order', 'required|valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'questiongroup' => array(
	        'key_from' => 'questiongroup_id',
	        'model_to' => 'Model_Questiongroup',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	);

}
