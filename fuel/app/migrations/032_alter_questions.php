<?php

namespace Fuel\Migrations;

class Alter_questions
{
	public function up()
	{
		\DBUtil::add_fields('questions', array(
			'questiongroup_id' => array('constraint' => 11, 'type' => 'int'),
		));

		\DBUtil::remove_fields('questions', array(
			'survey_id',
		));
	}

	public function down()
	{
	}
}
?>