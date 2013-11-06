<?php

namespace Fuel\Migrations;

class Add_sign_type_to_inout
{
	public function up()
	{
		\DBUtil::add_fields('inouts', array(
			'sign_type' => array('constraint' => 3, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('inouts', array(
			'sign_type'

		));
	}
}