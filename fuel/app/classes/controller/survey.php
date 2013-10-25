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

		$view = View::forge('survey/view', $data);
		return Response::forge($view);
	}
}
