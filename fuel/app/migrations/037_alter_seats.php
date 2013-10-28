<?php

namespace Fuel\Migrations;

class Alter_seats
{
	public function up()
	{
		\DBUtil::modify_fields('seats', array(
			'seat_direction' => array('constraint' => 5, 'type' => 'varchar'),
		));
	}

	public function down()
	{
	}
}
?>