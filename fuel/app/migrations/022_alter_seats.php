<?php

namespace Fuel\Migrations;

class Alter_seats
{
	public function up()
	{
		\DBUtil::add_fields('seats', array(
			'seat_height' => array('constraint' => 11, 'type' => 'int'),
			'seat_width' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{	
	}
}