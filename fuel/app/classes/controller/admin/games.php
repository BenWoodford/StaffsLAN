<?php
class Controller_Admin_Games extends Controller_Admin{

	public function action_index()
	{
		$data['games'] = Model_Game::find('all');
		$this->template->title = "Games";
		$this->template->content = View::forge('admin/games/index', $data);

	}

	public function action_view($id = null)
	{
		$data['game'] = Model_Game::find($id);

		$this->template->title = "Game";
		$this->template->content = View::forge('admin/games/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Game::validate('create');

			if ($val->run())
			{
				$game = Model_Game::forge(array(
					'game_id' => Input::post('game_id'),
					'game_title' => Input::post('game_title'),
					'game_image' => Input::post('game_image'),
					'steam_appid' => Input::post('steam_appid'),
				));

				if ($game and $game->save())
				{
					Session::set_flash('success', e('Added game #'.$game->id.'.'));

					Response::redirect('admin/games');
				}

				else
				{
					Session::set_flash('error', e('Could not save game.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Games";
		$this->template->content = View::forge('admin/games/create');

	}

	public function action_edit($id = null)
	{
		$game = Model_Game::find($id);
		$val = Model_Game::validate('edit');

		if ($val->run())
		{
			$game->game_id = Input::post('game_id');
			$game->game_title = Input::post('game_title');
			$game->game_image = Input::post('game_image');
			$game->steam_appid = Input::post('steam_appid');

			if ($game->save())
			{
				Session::set_flash('success', e('Updated game #' . $id));

				Response::redirect('admin/games');
			}

			else
			{
				Session::set_flash('error', e('Could not update game #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game->game_id = $val->validated('game_id');
				$game->game_title = $val->validated('game_title');
				$game->game_image = $val->validated('game_image');
				$game->steam_appid = $val->validated('steam_appid');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game', $game, false);
		}

		$this->template->title = "Games";
		$this->template->content = View::forge('admin/games/edit');

	}

	public function action_delete($id = null)
	{
		if ($game = Model_Game::find($id))
		{
			$game->delete();

			Session::set_flash('success', e('Deleted game #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete game #'.$id));
		}

		Response::redirect('admin/games');

	}


}