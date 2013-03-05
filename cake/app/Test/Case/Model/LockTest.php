<?php
App::uses('Lock', 'Model');

/**
 * Lock Test Case
 *
 */
class LockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lock',
		'app.schedule',
		'app.job_seeker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lock = ClassRegistry::init('Lock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lock);

		parent::tearDown();
	}

}
