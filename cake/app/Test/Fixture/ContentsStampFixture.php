<?php
/**
 * ContentsStampFixture
 *
 */
class ContentsStampFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ContentsStamps';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'content_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'stamp_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ContentsStamps_Contents1_idx' => array('column' => 'content_id', 'unique' => 0),
			'fk_ContentsStamps_Stamps1_idx' => array('column' => 'stamp_id', 'unique' => 0)
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
			'stamp_id' => 1,
			'count' => 1
		),
	);

}
