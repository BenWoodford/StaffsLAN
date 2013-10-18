<?php

namespace Fuel\Migrations;

class Create_rooms
{
	public function up()
	{
		\DBUtil::create_table('rooms', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'room_id' => array('constraint' => 11, 'type' => 'int'),
			'room_name' => array('constraint' => 32, 'type' => 'varchar'),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('rooms');
	}
}