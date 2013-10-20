<?php

class Controller_Base extends Controller_Template {

	public function before()
	{
		parent::before();

		// Assign current_user to the instance so controllers can use it
		if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
		{
			$this->current_user = Auth::check() ? Model\Auth_User::find_by_username(Auth::get_screen_name()) : null;
		}
		else
		{
			$this->current_user = Auth::check() ? Model_User::find_by_username(Auth::get_screen_name()) : null;
		}

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);

		View::set_global('custom_config', Config::load('custom'));

		$facebook = new Facebook(array('appId' => '565533596803930', 'secret' => 'ed4f20e2f1e2cd55a3a0968c58980785'));

		View::set_global('facebook', $facebook);

		echo View::forge('header');	
	}

	public function after($response) {
		$response = parent::after($response);
		$response->body($response->body() . View::forge('footer'));

		return $response;
	}

}