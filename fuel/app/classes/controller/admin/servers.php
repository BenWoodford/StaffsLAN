<?php
class Controller_Admin_Servers extends Controller_Admin{

	public function action_index()
	{
		$data['servers'] = Model_Server::find('all');
		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/servers/index', $data);

	}

	public function action_view($id = null)
	{
		$data['server'] = Model_Server::find($id);

		$this->template->title = "Server";
		$this->template->content = View::forge('admin/servers/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Server::validate('create');

			if ($val->run())
			{
				$server = Model_Server::forge(array(
					'server_id' => Input::post('server_id'),
					'server_title' => Input::post('server_title'),
					'server_host' => Input::post('server_host'),
					'server_port' => Input::post('server_port'),
					'server_type' => Input::post('server_type'),
					'lan_id' => Input::post('lan_id'),
				));

				if ($server and $server->save())
				{
					Session::set_flash('success', e('Added server #'.$server->id.'.'));

					Response::redirect('admin/servers');
				}

				else
				{
					Session::set_flash('error', e('Could not save server.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/servers/create');

	}

	public function action_edit($id = null)
	{
		$server = Model_Server::find($id);
		$val = Model_Server::validate('edit');

		if ($val->run())
		{
			$server->server_id = Input::post('server_id');
			$server->server_title = Input::post('server_title');
			$server->server_host = Input::post('server_host');
			$server->server_port = Input::post('server_port');
			$server->server_type = Input::post('server_type');
			$server->lan_id = Input::post('lan_id');

			if ($server->save())
			{
				Session::set_flash('success', e('Updated server #' . $id));

				Response::redirect('admin/servers');
			}

			else
			{
				Session::set_flash('error', e('Could not update server #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$server->server_id = $val->validated('server_id');
				$server->server_title = $val->validated('server_title');
				$server->server_host = $val->validated('server_host');
				$server->server_port = $val->validated('server_port');
				$server->server_type = $val->validated('server_type');
				$server->lan_id = $val->validated('lan_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('server', $server, false);
		}

		$this->template->title = "Servers";
		$this->template->content = View::forge('admin/servers/edit');

	}

	public function action_delete($id = null)
	{
		if ($server = Model_Server::find($id))
		{
			$server->delete();

			Session::set_flash('success', e('Deleted server #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete server #'.$id));
		}

		Response::redirect('admin/servers');

	}


}