<?php

namespace Fuel\Migrations;

class Create_questions
{
	public function up()
	{
		\DBUtil::create_table('questions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'question_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_text' => array('type' => 'text'),
			'survey_type' => array('constraint' => 32, 'type' => 'varchar'),
			'data' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('questions');
	}
}