<?php

namespace Fuel\Migrations;

class Alter_schedule_items
{
	public function up()
	{
		\DBUtil::add_fields('schedule_items', array(
			'schedule_item_class' => array('constraint' => 255, 'type' => 'varchar'),
		));
	}

	public function down()
	{
	}
}
?>