<?php
class Model_Schedule_Item extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'schedule_item_name',
		'schedule_item_description',
		'schedule_item_start',
		'schedule_item_end',
		'schedule_item_class',
		'lan_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('schedule_item_id', 'Schedule Item Id', 'required|valid_string[numeric]');
		$val->add_field('schedule_item_name', 'Schedule Item Name', 'required|max_length[255]');
		$val->add_field('schedule_item_class', 'Schedule Item Class', 'required|max_length[255]');
		$val->add_field('schedule_item_description', 'Schedule Item Description', 'required');
		$val->add_field('schedule_item_start', 'Schedule Item Start', 'required');
		$val->add_field('schedule_item_end', 'Schedule Item End', 'required');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');

		return $val;
	}

	public function checkDate($start, $end) {
		return 
			($this->schedule_item_start >= $start && $this->schedule_item_start <= $end) &&
			($this->schedule_item_end >= $start && $this->schedule_item_end <= $end);
	}

	public function startDateTime() {
		return new DateTime($this->schedule_item_start);
	}

	public function endDateTime() {
		return new DateTime($this->schedule_item_end);
	}

	public function isMultiDay() {
		return !($this->startDateTime()->format('d.m.Y') == $this->endDateTime()->format('d.m.Y'));
	}

	protected static $_belongs_to = array(
	    'lan' => array(
	        'key_from' => 'lan_id',
	        'model_to' => 'Model_Lan',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
		'tournament' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Tournament',
			'key_to' => 'schedule_item_id',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);

}
