<?php

namespace Fuel\Migrations;

class Create_questiongroups
{
	public function up()
	{
		\DBUtil::create_table('questiongroups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'group_name' => array('constraint' => 255, 'type' => 'varchar'),
			'survey_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('questiongroups');
	}
}