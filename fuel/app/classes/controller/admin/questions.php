<?php
class Controller_Admin_Questions extends Controller_Admin{

	public function action_index()
	{
		$data['questions'] = Model_Question::find('all');
		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/index', $data);

	}

	public function action_view($id = null)
	{
		$data['question'] = Model_Question::find($id);

		$this->template->title = "Question";
		$this->template->content = View::forge('admin/questions/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Question::validate('create');

			if ($val->run())
			{
				$question = Model_Question::forge(array(
					'question_id' => Input::post('question_id'),
					'survey_id' => Input::post('survey_id'),
					'survey_text' => Input::post('survey_text'),
					'survey_type' => Input::post('survey_type'),
					'data' => Input::post('data'),
				));

				if ($question and $question->save())
				{
					Session::set_flash('success', e('Added question #'.$question->id.'.'));

					Response::redirect('admin/questions');
				}

				else
				{
					Session::set_flash('error', e('Could not save question.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/create');

	}

	public function action_edit($id = null)
	{
		$question = Model_Question::find($id);
		$val = Model_Question::validate('edit');

		if ($val->run())
		{
			$question->question_id = Input::post('question_id');
			$question->survey_id = Input::post('survey_id');
			$question->survey_text = Input::post('survey_text');
			$question->survey_type = Input::post('survey_type');
			$question->data = Input::post('data');

			if ($question->save())
			{
				Session::set_flash('success', e('Updated question #' . $id));

				Response::redirect('admin/questions');
			}

			else
			{
				Session::set_flash('error', e('Could not update question #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$question->question_id = $val->validated('question_id');
				$question->survey_id = $val->validated('survey_id');
				$question->survey_text = $val->validated('survey_text');
				$question->survey_type = $val->validated('survey_type');
				$question->data = $val->validated('data');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('question', $question, false);
		}

		$this->template->title = "Questions";
		$this->template->content = View::forge('admin/questions/edit');

	}

	public function action_delete($id = null)
	{
		if ($question = Model_Question::find($id))
		{
			$question->delete();

			Session::set_flash('success', e('Deleted question #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete question #'.$id));
		}

		Response::redirect('admin/questions');

	}


}