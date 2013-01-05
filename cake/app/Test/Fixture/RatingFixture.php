<?php
/**
 * RatingFixture
 *
 */
class RatingFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Ratings';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'content_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'good' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '??????'),
		'bad' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '????????'),
		'laugh' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '????'),
		'scare' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '?????'),
		'throb' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '?????'),
		'sad' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '??????'),
		'excite' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '?????'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_Ratings_Contents1_idx' => array('column' => 'content_id', 'unique' => 0)
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
			'content_id' => 1,
			'good' => 1,
			'bad' => 1,
			'laugh' => 1,
			'scare' => 1,
			'throb' => 1,
			'sad' => 1,
			'excite' => 1,
			'created' => '2013-01-05 14:58:46',
			'modified' => '2013-01-05 14:58:46'
		),
	);

}
