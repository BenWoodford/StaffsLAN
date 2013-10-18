<?php
class Model_Question extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'survey_id',
		'survey_text',
		'survey_type',
		'data',
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
		$val->add_field('survey_id', 'Survey Id', 'required|valid_string[numeric]');
		$val->add_field('survey_text', 'Survey Text', 'required');
		$val->add_field('survey_type', 'Survey Type', 'required|max_length[32]');
		$val->add_field('data', 'Data', 'required');

		return $val;
	}

}
