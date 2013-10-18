<?php

namespace Fuel\Migrations;

class Create_schedule_items
{
	public function up()
	{
		\DBUtil::create_table('schedule_items', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'schedule_item_id' => array('constraint' => 11, 'type' => 'int'),
			'schedule_item_name' => array('constraint' => 255, 'type' => 'varchar'),
			'schedule_item_description' => array('type' => 'text'),
			'schedule_item_start' => array('type' => 'datetime'),
			'schedule_item_end' => array('type' => 'datetime'),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('schedule_items');
	}
}