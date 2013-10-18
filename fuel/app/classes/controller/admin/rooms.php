<?php
class Controller_Admin_Rooms extends Controller_Admin{

	public function action_index()
	{
		$data['rooms'] = Model_Room::find('all');
		$this->template->title = "Rooms";
		$this->template->content = View::forge('admin/rooms/index', $data);

	}

	public function action_view($id = null)
	{
		$data['room'] = Model_Room::find($id);

		$this->template->title = "Room";
		$this->template->content = View::forge('admin/rooms/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Room::validate('create');

			if ($val->run())
			{
				$room = Model_Room::forge(array(
					'room_id' => Input::post('room_id'),
					'room_name' => Input::post('room_name'),
					'lan_id' => Input::post('lan_id'),
				));

				if ($room and $room->save())
				{
					Session::set_flash('success', e('Added room #'.$room->id.'.'));

					Response::redirect('admin/rooms');
				}

				else
				{
					Session::set_flash('error', e('Could not save room.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Rooms";
		$this->template->content = View::forge('admin/rooms/create');

	}

	public function action_edit($id = null)
	{
		$room = Model_Room::find($id);
		$val = Model_Room::validate('edit');

		if ($val->run())
		{
			$room->room_id = Input::post('room_id');
			$room->room_name = Input::post('room_name');
			$room->lan_id = Input::post('lan_id');

			if ($room->save())
			{
				Session::set_flash('success', e('Updated room #' . $id));

				Response::redirect('admin/rooms');
			}

			else
			{
				Session::set_flash('error', e('Could not update room #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$room->room_id = $val->validated('room_id');
				$room->room_name = $val->validated('room_name');
				$room->lan_id = $val->validated('lan_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('room', $room, false);
		}

		$this->template->title = "Rooms";
		$this->template->content = View::forge('admin/rooms/edit');

	}

	public function action_delete($id = null)
	{
		if ($room = Model_Room::find($id))
		{
			$room->delete();

			Session::set_flash('success', e('Deleted room #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete room #'.$id));
		}

		Response::redirect('admin/rooms');

	}


}