<?php
/**
 * The Home Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Home extends Controller_Base
{
	public function before() {
		Asset::js('//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js', array(), 'page_assets');
		parent::before();
	}

	/**
	 * Awesome dashboard stuff
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data['lan'] = Model_Lan::nextLAN();

		// Todo items for user
		$todos = array();

		if(!Model_Survey::find(3)->userHasCompleted()) {
			$todos[] = array('icon' => 'list-alt', 'link' => '/survey/view/3', 'text' => 'Complete Online Check-in');
		}

		if(!$this->currentUser->hasSeat()) {
			$todos[] = array('icon' => 'ticket', 'link' => '/map/', 'text' => 'Pick your seat');
		}

		$data['todos'] = $todos;

		return Response::forge(View::forge('index', $data));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('error/404'), 404);
	}
}
