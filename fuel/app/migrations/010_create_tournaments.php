<?php

namespace Fuel\Migrations;

class Create_tournaments
{
	public function up()
	{
		\DBUtil::create_table('tournaments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'tournament_id' => array('constraint' => 11, 'type' => 'int'),
			'schedule_item_id' => array('constraint' => 11, 'type' => 'int'),
			'tournament_title' => array('constraint' => 255, 'type' => 'varchar'),
			'tournament_description' => array('type' => 'text'),
			'binarybeast_id' => array('constraint' => 11, 'type' => 'int'),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tournaments');
	}
}