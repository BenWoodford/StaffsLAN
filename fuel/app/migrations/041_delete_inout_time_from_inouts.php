<?php

namespace Fuel\Migrations;

class Delete_inout_time_from_inouts
{
	public function up()
	{
		\DBUtil::drop_fields('inouts', array(
			'inout_time'

		));
	}

	public function down()
	{
		\DBUtil::add_fields('inouts', array(
			'inout_time' => array('type' => 'datetime'),

		));
	}
}