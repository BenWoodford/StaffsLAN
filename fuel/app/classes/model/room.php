<?php
class Model_Room extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'room_name',
		'lan_id',
		'room_height',
		'room_width',
		'room_locx',
		'room_locy',
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
		$val->add_field('room_name', 'Room Name', 'required|max_length[32]');
		$val->add_field('lan_id', 'LAN ID', 'required|valid_string[numeric]');
		$val->add_field('room_locx', 'Room X', 'required|valid_string[numeric]');
		$val->add_field('room_locy', 'Room Y', 'required|valid_string[numeric]');
		$val->add_field('room_height', 'Room Height', 'required|valid_string[numeric]');
		$val->add_field('room_width', 'Room Width', 'required|valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'lan' => array(
	        'key_from' => 'lan_id',
	        'model_to' => 'Model_Lan',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
    );

	protected static $_has_many = array(
	    'blocks' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Block',
	        'key_to' => 'room_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

        public function cloneRoom() {
                $new = new Model_Room(array(
                        'room_name' => $this->room_name,
                        'lan_id' => $this->lan_id,
                        'room_locx' => $this->room_locx,
                        'room_locy' => $this->room_locy,
                        'room_height' => $this->room_height,
                        'room_width' => $this->room_width,
                ));

                $new->save();

                foreach($this->blocks as $block) {
                        $newblock = $block->cloneBlock();
                        $newblock->room_id = $new->id;
                        $new->blocks[] = $newblock;
                }

                $new->save();

                return $new;
        }
}
