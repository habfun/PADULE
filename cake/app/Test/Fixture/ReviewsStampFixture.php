<?php
/**
 * ReviewsStampFixture
 *
 */
class ReviewsStampFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ReviewsStamps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'review_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'stamp_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ReviewStanps_Reviews1_idx' => array('column' => 'review_id', 'unique' => 0),
			'fk_ReviewStanps_Stamps1_idx' => array('column' => 'stamp_id', 'unique' => 0)
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
			'review_id' => 1,
			'stamp_id' => 1
		),
	);

}
