<?php
class Controller_Admin_Teams extends Controller_Admin{

	public function action_index()
	{
		$data['teams'] = Model_Team::find('all');
		$this->template->title = "Teams";
		$this->template->content = View::forge('admin/teams/index', $data);

	}

	public function action_view($id = null)
	{
		$data['team'] = Model_Team::find($id);

		$this->template->title = "Team";
		$this->template->content = View::forge('admin/teams/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Team::validate('create');

			if ($val->run())
			{
				$team = Model_Team::forge(array(
					'team_id' => Input::post('team_id'),
					'name' => Input::post('name'),
					'tournament_id' => Input::post('tournament_id'),
				));

				if ($team and $team->save())
				{
					Session::set_flash('success', e('Added team #'.$team->id.'.'));

					Response::redirect('admin/teams');
				}

				else
				{
					Session::set_flash('error', e('Could not save team.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Teams";
		$this->template->content = View::forge('admin/teams/create');

	}

	public function action_edit($id = null)
	{
		$team = Model_Team::find($id);
		$val = Model_Team::validate('edit');

		if ($val->run())
		{
			$team->team_id = Input::post('team_id');
			$team->name = Input::post('name');
			$team->tournament_id = Input::post('tournament_id');

			if ($team->save())
			{
				Session::set_flash('success', e('Updated team #' . $id));

				Response::redirect('admin/teams');
			}

			else
			{
				Session::set_flash('error', e('Could not update team #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$team->team_id = $val->validated('team_id');
				$team->name = $val->validated('name');
				$team->tournament_id = $val->validated('tournament_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('team', $team, false);
		}

		$this->template->title = "Teams";
		$this->template->content = View::forge('admin/teams/edit');

	}

	public function action_delete($id = null)
	{
		if ($team = Model_Team::find($id))
		{
			$team->delete();

			Session::set_flash('success', e('Deleted team #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete team #'.$id));
		}

		Response::redirect('admin/teams');

	}


}