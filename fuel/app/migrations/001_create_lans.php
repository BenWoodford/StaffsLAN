<?php

namespace Fuel\Migrations;

class Create_lans
{
	public function up()
	{
		\DBUtil::create_table('lans', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'lan_start' => array('type' => 'datetime'),
			'lan_end' => array('type' => 'datetime'),
			'lan_title' => array('constraint' => 50, 'type' => 'varchar'),
			'lan_description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('lans');
	}
}