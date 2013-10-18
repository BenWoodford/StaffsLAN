<?php
class Model_Item extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'block_id',
		'item_description',
		'item_quantity',
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
		$val->add_field('block_id', 'Block Id', 'required|valid_string[numeric]');
		$val->add_field('item_description', 'Item Description', 'required|max_length[128]');
		$val->add_field('item_quantity', 'Item Quantity', 'required|valid_string[numeric]');

		return $val;
	}

}
