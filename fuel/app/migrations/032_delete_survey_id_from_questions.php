<?php

namespace Fuel\Migrations;

class Delete_survey_id_from_questions
{
	public function up()
	{
		\DBUtil::drop_fields('questions', array(
			'survey_id'

		));
	}

	public function down()
	{
		\DBUtil::add_fields('questions', array(
			'survey_id' => array('constraint' => 11, 'type' => 'int'),
		));
	}
}