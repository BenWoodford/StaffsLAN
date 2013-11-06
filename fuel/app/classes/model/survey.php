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

	public function userHasCompleted($uid = null) {
		if($uid == null) {
			$uid = Model_User::getCurrentUser()->id;
		}

		$qids = array();
		$question_count = 0;
		foreach($this->questiongroups as $group) {
			foreach($group->questions as $question) {
				$qids[] = $question->id;
				$question_count++;
			}
		}

		$count = Model_Answer::query()->where(array('user_id','=', $uid), array('question_id', 'IN', $qids))->count();

		if($count == $question_count)
			return true;
		else
			return false;
	}

	public function generateReport($output) {
		$qgs = $this->questiongroups;

		$qarray = array();
		$qids = array();
		$qarray[0] = "Username";
		foreach($qgs as $qg) {
			foreach($qg->questions as $q) {
				if($q->survey_type != 'info') {
					$qarray[$q->id] = $q->survey_text;
					$qids[] = $q->id;
				}
			}
		}

		$data = array();

		foreach($qids as $id) {
			$answers = Model_Answer::query()->where('question_id', $id)->get();
			foreach($answers as $a) {
				if(!isset($data[$a->user_id])) {
					$data[$a->user_id] = array();
					$data[$a->user_id][0] = Model_User::find($a->user_id)->username;
					foreach($qids as $tmpid) {
						$data[$a->user_id][$tmpid] = false;
					}
				}

				$data[$a->user_id][$a->question_id] = $a->value;
			}
		}

		$outputstr = "<table><thead><tr>";

		foreach($qarray as $text) {
			$outputstr .= "<th>" . $text . "</th>";
		}

		$outputstr .= "\n</tr></thead><tbody>";

		foreach($data as $user => $answers) {
			$outputstr .= "<tr>";

			foreach($answers as $an) {
				$outputstr .= "<td>" . $an . "</td>";
			}

			$outputstr .= "</tr>";
		}

		file_put_contents($output, $outputstr);
	}

}
