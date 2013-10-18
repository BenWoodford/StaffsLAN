<?php
class Controller_Admin_Blocks extends Controller_Admin{

	public function action_index()
	{
		$data['blocks'] = Model_Block::find('all');
		$this->template->title = "Blocks";
		$this->template->content = View::forge('admin/blocks/index', $data);

	}

	public function action_view($id = null)
	{
		$data['block'] = Model_Block::find($id);

		$this->template->title = "Block";
		$this->template->content = View::forge('admin/blocks/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Block::validate('create');

			if ($val->run())
			{
				$block = Model_Block::forge(array(
					'block_id' => Input::post('block_id'),
					'block_name' => Input::post('block_name'),
					'room_id' => Input::post('room_id'),
					'block_shorthand' => Input::post('block_shorthand'),
					'block_locx' => Input::post('block_locx'),
					'block_locy' => Input::post('block_locy'),
				));

				if ($block and $block->save())
				{
					Session::set_flash('success', e('Added block #'.$block->id.'.'));

					Response::redirect('admin/blocks');
				}

				else
				{
					Session::set_flash('error', e('Could not save block.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Blocks";
		$this->template->content = View::forge('admin/blocks/create');

	}

	public function action_edit($id = null)
	{
		$block = Model_Block::find($id);
		$val = Model_Block::validate('edit');

		if ($val->run())
		{
			$block->block_id = Input::post('block_id');
			$block->block_name = Input::post('block_name');
			$block->room_id = Input::post('room_id');
			$block->block_shorthand = Input::post('block_shorthand');
			$block->block_locx = Input::post('block_locx');
			$block->block_locy = Input::post('block_locy');

			if ($block->save())
			{
				Session::set_flash('success', e('Updated block #' . $id));

				Response::redirect('admin/blocks');
			}

			else
			{
				Session::set_flash('error', e('Could not update block #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$block->block_id = $val->validated('block_id');
				$block->block_name = $val->validated('block_name');
				$block->room_id = $val->validated('room_id');
				$block->block_shorthand = $val->validated('block_shorthand');
				$block->block_locx = $val->validated('block_locx');
				$block->block_locy = $val->validated('block_locy');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('block', $block, false);
		}

		$this->template->title = "Blocks";
		$this->template->content = View::forge('admin/blocks/edit');

	}

	public function action_delete($id = null)
	{
		if ($block = Model_Block::find($id))
		{
			$block->delete();

			Session::set_flash('success', e('Deleted block #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete block #'.$id));
		}

		Response::redirect('admin/blocks');

	}


}