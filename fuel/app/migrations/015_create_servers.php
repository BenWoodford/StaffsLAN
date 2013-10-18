<?php

namespace Fuel\Migrations;

class Create_servers
{
	public function up()
	{
		\DBUtil::create_table('servers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'server_id' => array('constraint' => 11, 'type' => 'int'),
			'server_title' => array('constraint' => 255, 'type' => 'varchar'),
			'server_host' => array('constraint' => 64, 'type' => 'varchar'),
			'server_port' => array('constraint' => 11, 'type' => 'int'),
			'server_type' => array('constraint' => 24, 'type' => 'varchar'),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('servers');
	}
}