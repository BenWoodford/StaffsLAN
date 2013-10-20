<?php

namespace Fuel\Migrations;

class Alter_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'avatar_url' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
		));
	}

	public function down()
	{	
	}
}
?>