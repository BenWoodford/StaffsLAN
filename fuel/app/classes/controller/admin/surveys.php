<?php
class Controller_Admin_Surveys extends Controller_Admin{

	public function action_index()
	{
		$data['surveys'] = Model_Survey::find('all');
		$this->template->title = "Surveys";
		$this->template->content = View::forge('admin/surveys/index', $data);

	}

	public function action_view($id = null)
	{
		$data['survey'] = Model_Survey::find($id);

		$this->template->title = "Survey";
		$this->template->content = View::forge('admin/surveys/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Survey::validate('create');

			if ($val->run())
			{
				$survey = Model_Survey::forge(array(
					'survey_id' => Input::post('survey_id'),
					'survey_title' => Input::post('survey_title'),
					'lan_id' => Input::post('lan_id'),
					'survey_description' => Input::post('survey_description'),
				));

				if ($survey and $survey->save())
				{
					Session::set_flash('success', e('Added survey #'.$survey->id.'.'));

					Response::redirect('admin/surveys');
				}

				else
				{
					Session::set_flash('error', e('Could not save survey.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Surveys";
		$this->template->content = View::forge('admin/surveys/create');

	}

	public function action_edit($id = null)
	{
		$survey = Model_Survey::find($id);
		$val = Model_Survey::validate('edit');

		if ($val->run())
		{
			$survey->survey_id = Input::post('survey_id');
			$survey->survey_title = Input::post('survey_title');
			$survey->lan_id = Input::post('lan_id');
			$survey->survey_description = Input::post('survey_description');

			if ($survey->save())
			{
				Session::set_flash('success', e('Updated survey #' . $id));

				Response::redirect('admin/surveys');
			}

			else
			{
				Session::set_flash('error', e('Could not update survey #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$survey->survey_id = $val->validated('survey_id');
				$survey->survey_title = $val->validated('survey_title');
				$survey->lan_id = $val->validated('lan_id');
				$survey->survey_description = $val->validated('survey_description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('survey', $survey, false);
		}

		$this->template->title = "Surveys";
		$this->template->content = View::forge('admin/surveys/edit');

	}

	public function action_delete($id = null)
	{
		if ($survey = Model_Survey::find($id))
		{
			$survey->delete();

			Session::set_flash('success', e('Deleted survey #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete survey #'.$id));
		}

		Response::redirect('admin/surveys');

	}


}