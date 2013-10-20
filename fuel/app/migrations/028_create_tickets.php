<?php

namespace Fuel\Migrations;

class Create_tickets
{
	public function up()
	{
		\DBUtil::create_table('tickets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'lan_id' => array('constraint' => 11, 'type' => 'int'),
			'student_number' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tickets');
	}
}