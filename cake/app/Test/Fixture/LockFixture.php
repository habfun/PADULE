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
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'job_seeker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'job_seeker_id', 'schedule_id'), 'unique' => 1),
			'fk_Locks_JobSeekers1_idx' => array('column' => 'job_seeker_id', 'unique' => 0),
			'fk_Locks_Schedules1_idx' => array('column' => 'schedule_id', 'unique' => 0)
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
			'job_seeker_id' => 1,
			'schedule_id' => 1,
			'type' => 1,
			'created' => '2013-03-11 23:52:25',
			'modified' => '2013-03-11 23:52:25'
		),
	);

}
