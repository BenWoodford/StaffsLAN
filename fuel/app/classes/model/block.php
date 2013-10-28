<?php
class Model_Block extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'block_name',
		'room_id',
		'block_shorthand',
		'block_locx',
		'block_locy',
		'block_height',
		'block_width',
		'block_actual_width',
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
		$val->add_field('block_name', 'Block Name', 'required|max_length[32]');
		$val->add_field('room_id', 'Room Id', 'required|valid_string[numeric]');
		$val->add_field('block_shorthand', 'Block Shorthand', 'required|max_length[4]');
		$val->add_field('block_locx', 'Block Locx', 'required|valid_string[numeric]');
		$val->add_field('block_locy', 'Block Locy', 'required|valid_string[numeric]');
		$val->add_field('block_height', 'Block Height', 'required|valid_string[numeric]');
		$val->add_field('block_width', 'Block Width', 'required|valid_string[numeric]');
		$val->add_field('block_actual_width', 'Block Actual Width', 'required|valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'room' => array(
	        'key_from' => 'room_id',
	        'model_to' => 'Model_Room',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
    );

    protected static $_has_many = array(
	    'seats' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Seat',
	        'key_to' => 'block_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public function cloneBlock() {
		$new = new Model_Block(array(
			'block_name' => $this->block_name,
			'room_id' => $this->room_id,
			'block_shorthand' => $this->block_shorthand,
			'block_locx' => $this->block_locx,
			'block_locy' => $this->block_locy,
			'block_height' => $this->block_height,
			'block_width' => $this->block_width,
			'block_actual_width' => $this->block_actual_width,
		));

		$new->save();

		foreach($this->seats as $seat) {
			$newseat = $seat->cloneSeat();
			$newseat->block_id = $new->id;
			$new->seats[] = $newseat;
		}

		$new->save();

		return $new;
	}

}
