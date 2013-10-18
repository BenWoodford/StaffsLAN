<?php

namespace Fuel\Migrations;

class Alter_rooms
{
	public function up()
	{
		\DBUtil::add_fields('rooms', array(
			'room_locx' => array('constraint' => 11, 'type' => 'int'),
			'room_locy' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
	}
}