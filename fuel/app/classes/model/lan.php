<?php
class Model_Lan extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'lan_start',
		'lan_end',
		'lan_title',
		'lan_description',
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
		$val->add_field('lan_start', 'Lan Start', 'required');
		$val->add_field('lan_end', 'Lan End', 'required');
		$val->add_field('lan_title', 'Lan Title', 'required|max_length[50]');
		$val->add_field('lan_description', 'Lan Description', 'required');

		return $val;
	}

	public static function nextLAN() {
		$nextlan = Model_Lan::find('first', array(
				'where' => array(
					array('lan_end', '>', date( 'Y-m-d H:i:s')),
				),
				'order_by' => array('lan_end' => 'asc'),
			)
		);

		if(!$nextlan) {
			$nextlan = Model_Lan::find('first', array(
					'where' => array(
						array('lan_end', '<', date( 'Y-m-d H:i:s'))
					),
					'order_by' => array('lan_end' => 'desc'),
				)
			);
		}

		return $nextlan;
	}

	public function getDates() {
		$p = new DatePeriod(
			new DateTime($this->lan_start),
			new DateInterval('P1D'),
			(new DateTime($this->lan_end))->modify("+1 day")
		);

		return $p;
	}

	protected static $_has_many = array(
	    'rooms' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Room',
	        'key_to' => 'lan_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'tickets' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Ticket',
	        'key_to' => 'lan_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'servers' => array(
	    	'key_from' => 'id',
	    	'model_to' => 'Model_Server',
	    	'key_to' => 'lan_id',
	    	'cascade_save' => true,
	    	'cascade_delete' => false,
	    ),
	    'schedule_items' => array(
	    	'key_from' => 'id',
	    	'model_to' => 'Model_Schedule_Item',
	    	'key_to' => 'lan_id',
	    	'cascade_save' => true,
	    	'cascade_delete' => false
	    ),
	    'surveys' => array(
	    	'key_from' => 'id',
	    	'model_to' => 'Model_Survey',
	    	'key_to' => 'lan_id',
	    	'cascade_save' => true,
	    	'cascade_delete' => false,
	    ),
	);

        public function cloneLAN() {
                $new = new Model_Lan(array(
                        'lan_start' => $this->lan_start,
                        'lan_end' => $this->lan_end,
                        'lan_title' => $this->lan_title,
                        'lan_description' => $this->lan_description,
                ));

                $new->save();

                foreach($this->rooms as $room) {
                        $newroom = $room->cloneRoom();
                        $newroom->lan_id = $new->id;
                        $new->rooms[] = $newroom;
                }

		foreach($this->surveys as $survey) {
			$newsurvey = $survey->cloneSurvey();
			$newsurvey->lan_id = $new->id;
			$new->surveys[] = $survey;
		}

                $new->save();

                return $new;
        }

}
