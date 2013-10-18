<?php
class Controller_Admin_Schedule_Items extends Controller_Admin{

	public function action_index()
	{
		$data['schedule_items'] = Model_Schedule_Item::find('all');
		$this->template->title = "Schedule_items";
		$this->template->content = View::forge('admin/schedule/items/index', $data);

	}

	public function action_view($id = null)
	{
		$data['schedule_item'] = Model_Schedule_Item::find($id);

		$this->template->title = "Schedule_item";
		$this->template->content = View::forge('admin/schedule/items/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Schedule_Item::validate('create');

			if ($val->run())
			{
				$schedule_item = Model_Schedule_Item::forge(array(
					'schedule_item_id' => Input::post('schedule_item_id'),
					'schedule_item_name' => Input::post('schedule_item_name'),
					'schedule_item_description' => Input::post('schedule_item_description'),
					'schedule_item_start' => Input::post('schedule_item_start'),
					'schedule_item_end' => Input::post('schedule_item_end'),
					'lan_id' => Input::post('lan_id'),
				));

				if ($schedule_item and $schedule_item->save())
				{
					Session::set_flash('success', e('Added schedule_item #'.$schedule_item->id.'.'));

					Response::redirect('admin/schedule/items');
				}

				else
				{
					Session::set_flash('error', e('Could not save schedule_item.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Schedule_Items";
		$this->template->content = View::forge('admin/schedule/items/create');

	}

	public function action_edit($id = null)
	{
		$schedule_item = Model_Schedule_Item::find($id);
		$val = Model_Schedule_Item::validate('edit');

		if ($val->run())
		{
			$schedule_item->schedule_item_id = Input::post('schedule_item_id');
			$schedule_item->schedule_item_name = Input::post('schedule_item_name');
			$schedule_item->schedule_item_description = Input::post('schedule_item_description');
			$schedule_item->schedule_item_start = Input::post('schedule_item_start');
			$schedule_item->schedule_item_end = Input::post('schedule_item_end');
			$schedule_item->lan_id = Input::post('lan_id');

			if ($schedule_item->save())
			{
				Session::set_flash('success', e('Updated schedule_item #' . $id));

				Response::redirect('admin/schedule/items');
			}

			else
			{
				Session::set_flash('error', e('Could not update schedule_item #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$schedule_item->schedule_item_id = $val->validated('schedule_item_id');
				$schedule_item->schedule_item_name = $val->validated('schedule_item_name');
				$schedule_item->schedule_item_description = $val->validated('schedule_item_description');
				$schedule_item->schedule_item_start = $val->validated('schedule_item_start');
				$schedule_item->schedule_item_end = $val->validated('schedule_item_end');
				$schedule_item->lan_id = $val->validated('lan_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('schedule_item', $schedule_item, false);
		}

		$this->template->title = "Schedule_items";
		$this->template->content = View::forge('admin/schedule/items/edit');

	}

	public function action_delete($id = null)
	{
		if ($schedule_item = Model_Schedule_Item::find($id))
		{
			$schedule_item->delete();

			Session::set_flash('success', e('Deleted schedule_item #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete schedule_item #'.$id));
		}

		Response::redirect('admin/schedule/items');

	}


}