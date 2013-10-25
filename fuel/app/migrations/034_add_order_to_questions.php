<?php

namespace Fuel\Migrations;

class Add_order_to_questions
{
	public function up()
	{
		\DBUtil::add_fields('questions', array(
			'order' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('questions', array(
			'order'

		));
	}
}