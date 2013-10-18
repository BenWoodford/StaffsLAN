<?php

namespace Fuel\Migrations;

class Alter_seats
{
	public function up()
	{
		\DBUtil::add_fields('seats', array(
			'user_id' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{	
	}
}