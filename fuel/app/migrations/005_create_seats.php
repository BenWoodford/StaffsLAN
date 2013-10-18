<?php

namespace Fuel\Migrations;

class Create_seats
{
	public function up()
	{
		\DBUtil::create_table('seats', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'seat_id' => array('constraint' => 11, 'type' => 'int'),
			'block_id' => array('constraint' => 11, 'type' => 'int'),
			'seat_num' => array('constraint' => 4, 'type' => 'varchar'),
			'seat_locx' => array('constraint' => 11, 'type' => 'int'),
			'seat_locy' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('seats');
	}
}