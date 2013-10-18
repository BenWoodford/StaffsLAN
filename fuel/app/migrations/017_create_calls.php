<?php

namespace Fuel\Migrations;

class Create_calls
{
	public function up()
	{
		\DBUtil::create_table('calls', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'call_id' => array('constraint' => 11, 'type' => 'int'),
			'call_message' => array('type' => 'text'),
			'call_user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('calls');
	}
}