<?php

namespace Fuel\Migrations;

class Add_validation_rule_to_questions
{
	public function up()
	{
		\DBUtil::add_fields('questions', array(
			'validation_rule' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('questions', array(
			'validation_rule'

		));
	}
}