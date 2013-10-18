<?php
class Controller_Admin_Lans extends Controller_Admin{

	public function action_index()
	{
		$data['lans'] = Model_Lan::find('all');
		$this->template->title = "Lans";
		$this->template->content = View::forge('admin/lans/index', $data);

	}

	public function action_view($id = null)
	{
		$data['lan'] = Model_Lan::find($id);

		$this->template->title = "Lan";
		$this->template->content = View::forge('admin/lans/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Lan::validate('create');

			if ($val->run())
			{
				$lan = Model_Lan::forge(array(
					'lan_id' => Input::post('lan_id'),
					'lan_start' => Input::post('lan_start'),
					'lan_end' => Input::post('lan_end'),
					'lan_title' => Input::post('lan_title'),
					'lan_description' => Input::post('lan_description'),
				));

				if ($lan and $lan->save())
				{
					Session::set_flash('success', e('Added lan #'.$lan->id.'.'));

					Response::redirect('admin/lans');
				}

				else
				{
					Session::set_flash('error', e('Could not save lan.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Lans";
		$this->template->content = View::forge('admin/lans/create');

	}

	public function action_edit($id = null)
	{
		$lan = Model_Lan::find($id);
		$val = Model_Lan::validate('edit');

		if ($val->run())
		{
			$lan->lan_id = Input::post('lan_id');
			$lan->lan_start = Input::post('lan_start');
			$lan->lan_end = Input::post('lan_end');
			$lan->lan_title = Input::post('lan_title');
			$lan->lan_description = Input::post('lan_description');

			if ($lan->save())
			{
				Session::set_flash('success', e('Updated lan #' . $id));

				Response::redirect('admin/lans');
			}

			else
			{
				Session::set_flash('error', e('Could not update lan #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$lan->lan_id = $val->validated('lan_id');
				$lan->lan_start = $val->validated('lan_start');
				$lan->lan_end = $val->validated('lan_end');
				$lan->lan_title = $val->validated('lan_title');
				$lan->lan_description = $val->validated('lan_description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('lan', $lan, false);
		}

		$this->template->title = "Lans";
		$this->template->content = View::forge('admin/lans/edit');

	}

	public function action_delete($id = null)
	{
		if ($lan = Model_Lan::find($id))
		{
			$lan->delete();

			Session::set_flash('success', e('Deleted lan #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete lan #'.$id));
		}

		Response::redirect('admin/lans');

	}


}