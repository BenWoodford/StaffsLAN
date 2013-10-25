<?php

class Controller_Base extends Controller_Template {

	protected $currentUser;

	public function before()
	{
		parent::before();

		// Set a global variable so views can use it
		$this->currentUser = Model_User::getCurrentUser();
		View::set_global('current_user', $this->currentUser);

		View::set_global('custom_config', Config::load('custom'));

		$facebook = new Facebook(array('appId' => '565533596803930', 'secret' => 'ed4f20e2f1e2cd55a3a0968c58980785'));

		View::set_global('facebook', $facebook);
	}

	public function after($response) {
		$response = parent::after($response);
		View::set_global('messages', Messages::get());
		$response->body(View::forge('header') . $response->body() . View::forge('footer'));

		return $response;
	}

}