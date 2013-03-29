<?php
/**
 * ScheduleFixture
 *
 */
class ScheduleFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Schedules';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'event_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'job_seeker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'start_datetime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'end_datetime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'job_seeker_id'), 'unique' => 1),
			'fk_Schedules_Events1_idx' => array('column' => 'event_id', 'unique' => 0),
			'fk_Schedules_JobSeekers1_idx' => array('column' => 'job_seeker_id', 'unique' => 0)
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
			'event_id' => 1,
			'job_seeker_id' => 1,
			'start_datetime' => '2013-03-11 23:53:32',
			'end_datetime' => '2013-03-11 23:53:32',
			'created' => '2013-03-11 23:53:32',
			'modified' => '2013-03-11 23:53:32'
		),
	);

}
