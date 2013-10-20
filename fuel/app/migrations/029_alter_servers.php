<?php

namespace Fuel\Migrations;

class Alter_servers
{
	public function up()
	{
		\DBUtil::add_fields('servers', array(
			'game_id' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{	
	}
}
?>