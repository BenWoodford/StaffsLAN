<?php

namespace Fuel\Migrations;

class Delete_date_from_answers
{
	public function up()
	{
		\DBUtil::drop_fields('answers', array(
			'date'

		));
	}

	public function down()
	{
		\DBUtil::add_fields('answers', array(
			'date' => array('type' => 'datetime'),

		));
	}
}