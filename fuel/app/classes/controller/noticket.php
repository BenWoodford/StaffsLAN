<?php
/**
 * The NoTicket Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_NoTicket extends Controller_Base
{
	public function action_index()
	{
		$view = View::forge('noticket');
		return Response::forge($view);
	}
}
