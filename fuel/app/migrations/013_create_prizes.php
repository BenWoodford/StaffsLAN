<?php

namespace Fuel\Migrations;

class Create_prizes
{
	public function up()
	{
		\DBUtil::create_table('prizes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'prize_id' => array('constraint' => 11, 'type' => 'int'),
			'tournament_id' => array('constraint' => 11, 'type' => 'int'),
			'prize_title' => array('constraint' => 255, 'type' => 'varchar'),
			'prize_order' => array('constraint' => 11, 'type' => 'int'),
			'prize_how' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('prizes');
	}
}