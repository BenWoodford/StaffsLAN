<?php
class Controller_Api extends Controller_Rest {

	private $current_user;

	public function before() {
		parent::before();

		$this->current_user = Model_User::getCurrentUser();
	}

	public function get_user() {
		$user = Model_User::find(Input::get('uid'));

		if(!$user) {
			return $this->response(array(
				'user' => null,
				'message' => 'User not found',
			));
		} else {
			return $this->response(array(
				'user' => array(
					'uid' => $user->id,
					'username' => $user->username,
					'volunteer' => $user->isVolunteer(),
					'student_number' => $user->student_number
					'checked_in' => Model_Survey::find(1)->userHasCompleted($user->id),
					'avatar' => $user->avatar_url,
				),
				'message' => 'success',
			));
		}
	}
}
?>