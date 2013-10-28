<?php
class Model_Survey extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'survey_title',
		'lan_id',
		'survey_description',
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
		$val->add_field('survey_title', 'Survey Title', 'required|max_length[255]');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');
		$val->add_field('survey_description', 'Survey Description', 'required');

		return $val;
	}

	protected static $_has_many = array(
		'questiongroups' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Questiongroup',
			'key_to' => 'survey_id',
			'cascade_save' => true,
			'cascade_delete' => true
		),
	);

	public function userHasCompleted() {
		$qids = array();
		$question_count = 0;
		foreach($this->questiongroups as $group) {
			foreach($group->questions as $question) {
				$qids[] = $question->id;
				$question_count++;
			}
		}

		$count = Model_Answer::query()->where(array('user_id','=', $this->currentUser->id, array('question_id', 'IN', $qids))->count();

		if($count > 0)
			return true;
		else
			return false;
	}

}
