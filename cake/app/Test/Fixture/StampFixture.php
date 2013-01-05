<?php
/**
 * StampFixture
 *
 */
class StampFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Stamps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'feeling_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'enabled' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_Stamps_FeelingTypes1_idx' => array('column' => 'feeling_type_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'feeling_type_id' => 1,
			'enabled' => 1,
			'created' => '2013-01-05 15:00:25',
			'modified' => '2013-01-05 15:00:25'
		),
	);

}
