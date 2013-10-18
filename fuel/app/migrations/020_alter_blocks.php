<?php

namespace Fuel\Migrations;

class Alter_blocks
{
	public function up()
	{
		\DBUtil::add_fields('blocks', array(
			'block_height' => array('constraint' => 11, 'type' => 'int'),
			'block_width' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
	}
}