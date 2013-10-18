<?php
class Controller_Admin_Items extends Controller_Admin{

	public function action_index()
	{
		$data['items'] = Model_Item::find('all');
		$this->template->title = "Items";
		$this->template->content = View::forge('admin/items/index', $data);

	}

	public function action_view($id = null)
	{
		$data['item'] = Model_Item::find($id);

		$this->template->title = "Item";
		$this->template->content = View::forge('admin/items/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('create');

			if ($val->run())
			{
				$item = Model_Item::forge(array(
					'item_id' => Input::post('item_id'),
					'block_id' => Input::post('block_id'),
					'item_description' => Input::post('item_description'),
					'item_quantity' => Input::post('item_quantity'),
				));

				if ($item and $item->save())
				{
					Session::set_flash('success', e('Added item #'.$item->id.'.'));

					Response::redirect('admin/items');
				}

				else
				{
					Session::set_flash('error', e('Could not save item.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/items/create');

	}

	public function action_edit($id = null)
	{
		$item = Model_Item::find($id);
		$val = Model_Item::validate('edit');

		if ($val->run())
		{
			$item->item_id = Input::post('item_id');
			$item->block_id = Input::post('block_id');
			$item->item_description = Input::post('item_description');
			$item->item_quantity = Input::post('item_quantity');

			if ($item->save())
			{
				Session::set_flash('success', e('Updated item #' . $id));

				Response::redirect('admin/items');
			}

			else
			{
				Session::set_flash('error', e('Could not update item #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$item->item_id = $val->validated('item_id');
				$item->block_id = $val->validated('block_id');
				$item->item_description = $val->validated('item_description');
				$item->item_quantity = $val->validated('item_quantity');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('item', $item, false);
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/items/edit');

	}

	public function action_delete($id = null)
	{
		if ($item = Model_Item::find($id))
		{
			$item->delete();

			Session::set_flash('success', e('Deleted item #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete item #'.$id));
		}

		Response::redirect('admin/items');

	}


}