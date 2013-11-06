<?php

namespace Fuel\Migrations;

class Delete_inout_id_from_inouts
{
	public function up()
	{
		\DBUtil::drop_fields('inouts', array(
			'inout_id'

		));
	}

	public function down()
	{
		\DBUtil::add_fields('inouts', array(
			'inout_id' => array('constraint' => 11, 'type' => 'int'),

		));
	}
}