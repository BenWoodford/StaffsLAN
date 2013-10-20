<?php

class Model_Ticket extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'lan_id',
		'student_number',
	);

	protected static $_table_name = 'tickets';

	protected static $_belongs_to = array(
	    'user' => array(
	        'key_from' => 'student_number',
	        'model_to' => 'Model_User',
	        'key_to' => 'student_number',
	        'cascade_save' => false,
	        'cascade_delete' => false,
	    ),
	    'lan' => array(
	        'key_from' => 'lan_id',
	        'model_to' => 'Model_Lan',
	        'key_to' => 'id',
	        'cascade_save' => false,
	        'cascade_delete' => false,
	    )
	);

}
