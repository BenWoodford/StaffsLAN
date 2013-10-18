<?php
/**
 * The Map Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Map extends Controller_Base
{
	public function action_index()
	{
		$data = array();
		$data['rooms'] = $rooms = Model_Lan::nextLAN()->rooms;

		$view = View::forge('map', $data);
		return Response::forge($view);
	}
}
