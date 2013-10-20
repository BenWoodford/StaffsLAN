<?php

namespace Fuel\Migrations;

class Alter_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'steam' => array('constraint' => 16, 'type' => 'varchar'),
			'student_number' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{	
	}
}
?>