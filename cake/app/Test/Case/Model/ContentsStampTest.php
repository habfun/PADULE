<?php
App::uses('ContentsStamp', 'Model');

/**
 * ContentsStamp Test Case
 *
 */
class ContentsStampTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contents_stamp'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContentsStamp = ClassRegistry::init('ContentsStamp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContentsStamp);

		parent::tearDown();
	}

}
