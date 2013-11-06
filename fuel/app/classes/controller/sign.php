<?php

class Controller_Sign extends Controller_Base
{
	public function action_index()
	{
		$data['log'] = array();
		$view = View::forge('sign', $data);
		return Response::forge($view);
	}

	public function action_in() {
		Model_Inout::SignIn($this->current_user->id);

		Response::redirect('/sign');
	}

	public function action_out() {
		Model_Inout::SignOut($this->current_user->id);

		Response::redirect('/sign');
	}
}

?>