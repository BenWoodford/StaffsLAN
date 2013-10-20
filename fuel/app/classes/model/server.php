<?php
class Model_Server extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'server_title',
		'server_host',
		'server_port',
		'server_type',
		'lan_id',
		'game_id',
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
		$val->add_field('server_title', 'Server Title', 'required|max_length[255]');
		$val->add_field('server_host', 'Server Host', 'required|max_length[64]');
		$val->add_field('server_port', 'Server Port', 'required|valid_string[numeric]');
		$val->add_field('server_type', 'Server Type', 'required|max_length[24]');
		$val->add_field('lan_id', 'Lan Id', 'required|valid_string[numeric]');
		$val->add_field('gamme_id', 'Game Id', 'required|valid_string[numeric]');

		return $val;
	}

	protected static $_belongs_to = array(
	    'lan' => array(
	        'key_from' => 'lan_id',
	        'model_to' => 'Model_Lan',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
		'game' => array(
			'key_from' => 'game_id',
			'model_to' => 'Model_Game',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);

	public function createURI() {
		switch($this->server_type) {
			case 'steam':
				return 'steam://gameinfo/' . $this->server_host . ':' . $this->server_port;

			case 'ts3':
				return 'ts3server://' . $this->server_host . '?port=' . $this->server_port;

			default:
				return '#';
		}
	}

	public function printURI() {
		echo $this->createURI();
	}
}
