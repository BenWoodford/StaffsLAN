<?php

namespace Fuel\Migrations;

class Create_surveys
{
	public function up()
	{
		\DBUtil::create_table('surveys', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'survey_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_title' => array('constraint' => 255, 'type' => 'varchar'),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('surveys');
	}
}