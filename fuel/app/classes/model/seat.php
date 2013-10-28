<?php
class Model_Seat extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'block_id',
		'user_id',
		'seat_num',
		'seat_locx',
		'seat_locy',
		'seat_width',
		'seat_height',
		'seat_direction',
		'seat_type',
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

	public function isOccupied() {
		return $this->user_id > 0;
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('block_id', 'Block Id', 'required|valid_string[numeric]');
		$val->add_field('user_id', 'User Id', 'valid_string[numeric]');
		$val->add_field('seat_num', 'Seat Num', 'required|max_length[4]');
		$val->add_field('seat_locx', 'Seat Locx', 'required|valid_string[numeric]');
		$val->add_field('seat_locy', 'Seat Locy', 'required|valid_string[numeric]');
		$val->add_field('seat_height', 'Seat Height', 'required|valid_string[numeric]');
		$val->add_field('seat_width', 'Seat Width', 'required|valid_string[numeric]');
		$val->add_field('seat_direction', 'Seat Direction', 'required|max_length[6]');
		$val->add_field('seat_type', 'Seat Type', 'required|max_length[16]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'block' => array(
	        'key_from' => 'block_id',
	        'model_to' => 'Model_Block',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_has_one = array(
		'user' => array(
			'key_from' => 'user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);

	public function cloneSeat() {
		$new = new Model_Seat(array(
			'block_id' => $this->block_id,
			'user_id' => 0,
			'seat_num' => $this->seat_num,
			'seat_locx' => $this->seat_locx,
			'seat_locy' => $this->seat_locy,
			'seat_height' => $this->seat_height,
			'seat_width' => $this->seat_width,
			'seat_direction' => $this->seat_direction,
			'seat_type' => $this->seat_type,
		));

		$new->save();

		return $new;
	}

	public static function getSeat($block, $num) {
		return Model_Seat::query()
		->related("block")
		->related("block.room")
		->related("block.room.lan")
		->where(array(array("block.room.lan.id" => Model_Lan::nextLAN()->id), array('seat_num' => $num), array("block.block_shorthand" => $block)))
		->get_one();
	}

}
