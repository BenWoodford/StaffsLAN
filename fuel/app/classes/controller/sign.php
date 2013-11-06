<?php

class Controller_Sign extends Controller_Base
{
	public function action_index()
	{
		$data['log'] = Model_Inout::query()->where(array(array('user_id' => $this->currentUser->id), array('lan_id' => Model_Lan::nextLAN()->id)))->order_by('inout_time', 'DESC')->get();
		$view = View::forge('sign', $data);
		return Response::forge($view);
	}

	public function action_in() {
		Model_Inout::SignIn($this->currentUser->id);

		Response::redirect('/sign');
	}

	public function action_out() {
		Model_Inout::SignOut($this->currentUser->id);

		Response::redirect('/sign');
	}

	public function action_other($uid = 0) {
		if(!$this->currentUser->isVolunteer()) {
			Response::redirect('/sign');
			return;
		}

		$data['user'] = false;

		if($uid != 0)
			$data['user'] = Model_User::find(@intval($uid));

		$view = View::forge('signother', $data);
		return Response::forge($view);
	}

	public function post_other() {
		$entry = Input::post('entry');

		if(Input::get('error',false)) {
			if(Input::get('error') == "numeric") {
				Messages::danger("That is not a number!");
			}

			if(Input::get('error') == "unknown_number") {
				Messages::danger("That Student Number is not in our database...");
			}
		}

		if(!is_numeric($entry)) {
			Response::redirect('/sign/other/?error=numeric');
			return;
		}

		if(strlen($entry) > 7 && strlen($entry) < 10) {
			// It's a student number!
			$find = Model_User::query()->where('student_number',$entry);

			if($find->count() == 0) {
				Response::redirect('/sign/other/?error=unknown_number');
				return;
			}

			$user = $find->get_one();

			Model_Inout::SignIn($user->id);
			Response::redirect('/sign/other/' . $user->id);
			return;
		}

		if(strlen($entry) > 10) {
			// Student Card. Not done yet.
		}
	}
}

?>