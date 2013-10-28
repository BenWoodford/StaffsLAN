<?php

namespace Fuel\Migrations;

class Add_is_volunteer_to_tickets
{
	public function up()
	{
		\DBUtil::add_fields('tickets', array(
			'is_volunteer' => array('type' => 'tinyint'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('tickets', array(
			'is_volunteer'

		));
	}
}