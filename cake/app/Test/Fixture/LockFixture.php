<?php
/**
 * LockFixture
 *
 */
class LockFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Locks';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'job_seeker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'lock_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'schedule_id' => 1,
			'job_seeker_id' => 1,
			'lock_type' => 1,
			'created' => '2013-02-09 13:27:59',
			'modified' => '2013-02-09 13:27:59'
		),
	);

}
