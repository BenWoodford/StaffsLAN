<?php
/**
 * The Survey Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Survey extends Controller_Base
{
	public function before() {
		Asset::js('map.js', array(), 'page_assets');
		parent::before();
	}

	public function action_index()
	{
		$data = array('surveys' => array());
		foreach(Model_Lan::nextLAN()->surveys as $survey) {
			$survey->is_complete = $survey->userHasCompleted();
			$data['surveys'][] = $survey;
		}

		$view = View::forge('survey/index', $data);
		return Response::forge($view);
	}

	public function action_view($sid = 0) {
		$data = array();

		if($sid == 0) {
			\Response::redirect('/survey');
		} else {
			$data['survey'] = Model_Survey::find($sid);
		}

		$validation = \Validation::forge();
		$validation->add_callable("ExtraValidation");

		$validation->set_message("phone_number", "The :label you provided is not a valid UK phone number. If you used +44, did you remove the preceding 0?");

		$validation->set_message("required_with", "Based on the information you have entered, you must fill in the <em>:label</em> field");

		$qids = array();
		$qobj = array();
		$prefill = array();

		foreach($data['survey']->questiongroups as $qg) {
			foreach($qg->questions as $q) {
				$qids[] = $q->id;
				$qobj['question' . $q->id] = $q;

				// Prefill inputs
				$query = Model_Answer::query()->where(array(array('user_id' => $this->currentUser->id), array('question_id' => $q->id)));

				if($query->count() > 0) {
					$prefill['question' . $q->id] = Input::post('question' . $q->id, $query->get_one()->value);
				}

				if(!empty($q->validation_rule))
					$validation->add_field('question' . $q->id, $q->survey_text, $q->validation_rule);
				else
					$validation->add_field('question' . $q->id, $q->survey_text, array());
			}
		}

		foreach(Input::post() as $field => $input) {
			if(!isset($prefill[$field])) {
				$prefill[$field] = $input;
			}
		}

		if($validation->run()) {
			foreach($validation->validated() as $key => $val) {
				$find = Model_Answer::query()->where(array(array('user_id' => $this->currentUser->id), array('question_id' => str_replace("question", "", $key))));

				if($find->count() >= 1) {
					$ans = $find->get_one();
				} else {
					$ans = new Model_Answer();
				}

				$ans->question_id = $qobj[$key]->id;
				$ans->user_id = $this->currentUser->id;
				$ans->value = ($val == null ? false : $val);
				$ans->save();
			}

			\Response::Redirect('/survey/');
		}

		foreach($validation->error_message() as $msg) {
			Messages::danger($msg);
		}


		if(count($validation->error_message()) == 0) {
			if($data['survey']->userHasCompleted()) {
				Messages::success("You're already completed this survey, thanks! You can still edit your answers below though.");
			}
		}

		$data['prefill'] = $prefill;

		$view = View::forge('survey/view', $data);
		return Response::forge($view);
	}
}
