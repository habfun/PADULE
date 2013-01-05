<?php
App::uses('ReviewsStamp', 'Model');

/**
 * ReviewsStamp Test Case
 *
 */
class ReviewsStampTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reviews_stamp'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ReviewsStamp = ClassRegistry::init('ReviewsStamp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ReviewsStamp);

		parent::tearDown();
	}

}
