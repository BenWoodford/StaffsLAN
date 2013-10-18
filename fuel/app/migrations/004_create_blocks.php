<?php

namespace Fuel\Migrations;

class Create_blocks
{
	public function up()
	{
		\DBUtil::create_table('blocks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'block_id' => array('constraint' => 11, 'type' => 'int'),
			'block_name' => array('constraint' => 32, 'type' => 'varchar'),
			'room_id' => array('constraint' => 11, 'type' => 'int'),
			'block_shorthand' => array('constraint' => 4, 'type' => 'varchar'),
			'block_locx' => array('constraint' => 11, 'type' => 'int'),
			'block_locy' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocks');
	}
}