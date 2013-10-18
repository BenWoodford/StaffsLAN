<?php
class Controller_Admin_Inouts extends Controller_Admin{

	public function action_index()
	{
		$data['inouts'] = Model_Inout::find('all');
		$this->template->title = "Inouts";
		$this->template->content = View::forge('admin/inouts/index', $data);

	}

	public function action_view($id = null)
	{
		$data['inout'] = Model_Inout::find($id);

		$this->template->title = "Inout";
		$this->template->content = View::forge('admin/inouts/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Inout::validate('create');

			if ($val->run())
			{
				$inout = Model_Inout::forge(array(
					'inout_id' => Input::post('inout_id'),
					'user_id' => Input::post('user_id'),
					'inout_time' => Input::post('inout_time'),
					'lan_id' => Input::post('lan_id'),
				));

				if ($inout and $inout->save())
				{
					Session::set_flash('success', e('Added inout #'.$inout->id.'.'));

					Response::redirect('admin/inouts');
				}

				else
				{
					Session::set_flash('error', e('Could not save inout.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Inouts";
		$this->template->content = View::forge('admin/inouts/create');

	}

	public function action_edit($id = null)
	{
		$inout = Model_Inout::find($id);
		$val = Model_Inout::validate('edit');

		if ($val->run())
		{
			$inout->inout_id = Input::post('inout_id');
			$inout->user_id = Input::post('user_id');
			$inout->inout_time = Input::post('inout_time');
			$inout->lan_id = Input::post('lan_id');

			if ($inout->save())
			{
				Session::set_flash('success', e('Updated inout #' . $id));

				Response::redirect('admin/inouts');
			}

			else
			{
				Session::set_flash('error', e('Could not update inout #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$inout->inout_id = $val->validated('inout_id');
				$inout->user_id = $val->validated('user_id');
				$inout->inout_time = $val->validated('inout_time');
				$inout->lan_id = $val->validated('lan_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('inout', $inout, false);
		}

		$this->template->title = "Inouts";
		$this->template->content = View::forge('admin/inouts/edit');

	}

	public function action_delete($id = null)
	{
		if ($inout = Model_Inout::find($id))
		{
			$inout->delete();

			Session::set_flash('success', e('Deleted inout #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete inout #'.$id));
		}

		Response::redirect('admin/inouts');

	}


}