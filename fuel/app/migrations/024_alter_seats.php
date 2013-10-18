<?php

namespace Fuel\Migrations;

class Alter_seats
{
	public function up()
	{
		\DBUtil::add_fields('seats', array(
			'seat_direction' => array('constraint' => 4, 'type' => 'varchar'),
		));
	}

	public function down()
	{	
	}
}
?>