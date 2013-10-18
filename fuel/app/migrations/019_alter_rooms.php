<?php

namespace Fuel\Migrations;

class Alter_rooms
{
	public function up()
	{
		\DBUtil::add_fields('rooms', array(
			'room_height' => array('constraint' => 11, 'type' => 'int'),
			'room_width' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
	}
}