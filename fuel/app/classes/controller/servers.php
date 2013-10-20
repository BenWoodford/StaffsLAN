<?php
/**
 * The Servers Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Servers extends Controller_Base
{
	public function action_index()
	{
		$data = array();
		$data['servers'] = Model_Lan::nextLAN()->servers;

		$view = View::forge('servers', $data);
		return Response::forge($view);
	}
}
