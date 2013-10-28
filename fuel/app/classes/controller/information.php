<?php
/**
 * The Information Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Information extends Controller_Base
{
	public function action_index()
	{
		$view = View::forge('information');
		return Response::forge($view);
	}
}
