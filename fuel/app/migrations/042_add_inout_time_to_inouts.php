<?php

namespace Fuel\Migrations;

class Add_inout_time_to_inouts
{
	public function up()
	{
		\DBUtil::add_fields('inouts', array(
			'inout_time' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('inouts', array(
			'inout_time'

		));
	}
}