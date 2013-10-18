<?php
class Controller_Admin_Tournaments extends Controller_Admin{

	public function action_index()
	{
		$data['tournaments'] = Model_Tournament::find('all');
		$this->template->title = "Tournaments";
		$this->template->content = View::forge('admin/tournaments/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tournament'] = Model_Tournament::find($id);

		$this->template->title = "Tournament";
		$this->template->content = View::forge('admin/tournaments/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Tournament::validate('create');

			if ($val->run())
			{
				$tournament = Model_Tournament::forge(array(
					'tournament_id' => Input::post('tournament_id'),
					'schedule_item_id' => Input::post('schedule_item_id'),
					'tournament_title' => Input::post('tournament_title'),
					'tournament_description' => Input::post('tournament_description'),
					'binarybeast_id' => Input::post('binarybeast_id'),
					'lan_id' => Input::post('lan_id'),
				));

				if ($tournament and $tournament->save())
				{
					Session::set_flash('success', e('Added tournament #'.$tournament->id.'.'));

					Response::redirect('admin/tournaments');
				}

				else
				{
					Session::set_flash('error', e('Could not save tournament.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tournaments";
		$this->template->content = View::forge('admin/tournaments/create');

	}

	public function action_edit($id = null)
	{
		$tournament = Model_Tournament::find($id);
		$val = Model_Tournament::validate('edit');

		if ($val->run())
		{
			$tournament->tournament_id = Input::post('tournament_id');
			$tournament->schedule_item_id = Input::post('schedule_item_id');
			$tournament->tournament_title = Input::post('tournament_title');
			$tournament->tournament_description = Input::post('tournament_description');
			$tournament->binarybeast_id = Input::post('binarybeast_id');
			$tournament->lan_id = Input::post('lan_id');

			if ($tournament->save())
			{
				Session::set_flash('success', e('Updated tournament #' . $id));

				Response::redirect('admin/tournaments');
			}

			else
			{
				Session::set_flash('error', e('Could not update tournament #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tournament->tournament_id = $val->validated('tournament_id');
				$tournament->schedule_item_id = $val->validated('schedule_item_id');
				$tournament->tournament_title = $val->validated('tournament_title');
				$tournament->tournament_description = $val->validated('tournament_description');
				$tournament->binarybeast_id = $val->validated('binarybeast_id');
				$tournament->lan_id = $val->validated('lan_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tournament', $tournament, false);
		}

		$this->template->title = "Tournaments";
		$this->template->content = View::forge('admin/tournaments/edit');

	}

	public function action_delete($id = null)
	{
		if ($tournament = Model_Tournament::find($id))
		{
			$tournament->delete();

			Session::set_flash('success', e('Deleted tournament #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete tournament #'.$id));
		}

		Response::redirect('admin/tournaments');

	}


}