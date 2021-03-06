<?php

namespace Fuel\Migrations;

class Create_games
{
	public function up()
	{
		\DBUtil::create_table('games', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'game_id' => array('constraint' => 11, 'type' => 'int'),
			'game_title' => array('constraint' => 255, 'type' => 'varchar'),
			'game_image' => array('type' => 'text'),
			'steam_appid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('games');
	}
}