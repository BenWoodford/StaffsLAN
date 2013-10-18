<?php

namespace Fuel\Migrations;

class Alter_seats
{
	public function up()
	{
		\DBUtil::add_fields('seats', array(
			'seat_type' => array('constraint' => 16, 'type' => 'varchar'),
		));
	}

	public function down()
	{	
	}
}
?>