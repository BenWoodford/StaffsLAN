<?php
class Controller_Admin_Seats extends Controller_Admin{

	public function action_index()
	{
		$data['seats'] = Model_Seat::find('all');
		$this->template->title = "Seats";
		$this->template->content = View::forge('admin/seats/index', $data);

	}

	public function action_view($id = null)
	{
		$data['seat'] = Model_Seat::find($id);

		$this->template->title = "Seat";
		$this->template->content = View::forge('admin/seats/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Seat::validate('create');

			if ($val->run())
			{
				$seat = Model_Seat::forge(array(
					'seat_id' => Input::post('seat_id'),
					'block_id' => Input::post('block_id'),
					'seat_num' => Input::post('seat_num'),
					'seat_locx' => Input::post('seat_locx'),
					'seat_locy' => Input::post('seat_locy'),
				));

				if ($seat and $seat->save())
				{
					Session::set_flash('success', e('Added seat #'.$seat->id.'.'));

					Response::redirect('admin/seats');
				}

				else
				{
					Session::set_flash('error', e('Could not save seat.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Seats";
		$this->template->content = View::forge('admin/seats/create');

	}

	public function action_edit($id = null)
	{
		$seat = Model_Seat::find($id);
		$val = Model_Seat::validate('edit');

		if ($val->run())
		{
			$seat->seat_id = Input::post('seat_id');
			$seat->block_id = Input::post('block_id');
			$seat->seat_num = Input::post('seat_num');
			$seat->seat_locx = Input::post('seat_locx');
			$seat->seat_locy = Input::post('seat_locy');

			if ($seat->save())
			{
				Session::set_flash('success', e('Updated seat #' . $id));

				Response::redirect('admin/seats');
			}

			else
			{
				Session::set_flash('error', e('Could not update seat #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$seat->seat_id = $val->validated('seat_id');
				$seat->block_id = $val->validated('block_id');
				$seat->seat_num = $val->validated('seat_num');
				$seat->seat_locx = $val->validated('seat_locx');
				$seat->seat_locy = $val->validated('seat_locy');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('seat', $seat, false);
		}

		$this->template->title = "Seats";
		$this->template->content = View::forge('admin/seats/edit');

	}

	public function action_delete($id = null)
	{
		if ($seat = Model_Seat::find($id))
		{
			$seat->delete();

			Session::set_flash('success', e('Deleted seat #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete seat #'.$id));
		}

		Response::redirect('admin/seats');

	}


}