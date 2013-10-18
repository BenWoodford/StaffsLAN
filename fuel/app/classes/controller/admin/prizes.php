<?php
class Controller_Admin_Prizes extends Controller_Admin{

	public function action_index()
	{
		$data['prizes'] = Model_Prize::find('all');
		$this->template->title = "Prizes";
		$this->template->content = View::forge('admin/prizes/index', $data);

	}

	public function action_view($id = null)
	{
		$data['prize'] = Model_Prize::find($id);

		$this->template->title = "Prize";
		$this->template->content = View::forge('admin/prizes/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Prize::validate('create');

			if ($val->run())
			{
				$prize = Model_Prize::forge(array(
					'prize_id' => Input::post('prize_id'),
					'tournament_id' => Input::post('tournament_id'),
					'prize_title' => Input::post('prize_title'),
					'prize_order' => Input::post('prize_order'),
					'prize_how' => Input::post('prize_how'),
				));

				if ($prize and $prize->save())
				{
					Session::set_flash('success', e('Added prize #'.$prize->id.'.'));

					Response::redirect('admin/prizes');
				}

				else
				{
					Session::set_flash('error', e('Could not save prize.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Prizes";
		$this->template->content = View::forge('admin/prizes/create');

	}

	public function action_edit($id = null)
	{
		$prize = Model_Prize::find($id);
		$val = Model_Prize::validate('edit');

		if ($val->run())
		{
			$prize->prize_id = Input::post('prize_id');
			$prize->tournament_id = Input::post('tournament_id');
			$prize->prize_title = Input::post('prize_title');
			$prize->prize_order = Input::post('prize_order');
			$prize->prize_how = Input::post('prize_how');

			if ($prize->save())
			{
				Session::set_flash('success', e('Updated prize #' . $id));

				Response::redirect('admin/prizes');
			}

			else
			{
				Session::set_flash('error', e('Could not update prize #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$prize->prize_id = $val->validated('prize_id');
				$prize->tournament_id = $val->validated('tournament_id');
				$prize->prize_title = $val->validated('prize_title');
				$prize->prize_order = $val->validated('prize_order');
				$prize->prize_how = $val->validated('prize_how');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('prize', $prize, false);
		}

		$this->template->title = "Prizes";
		$this->template->content = View::forge('admin/prizes/edit');

	}

	public function action_delete($id = null)
	{
		if ($prize = Model_Prize::find($id))
		{
			$prize->delete();

			Session::set_flash('success', e('Deleted prize #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete prize #'.$id));
		}

		Response::redirect('admin/prizes');

	}


}