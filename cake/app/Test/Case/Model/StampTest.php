<?php
App::uses('Stamp', 'Model');

/**
 * Stamp Test Case
 *
 */
class StampTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stamp'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stamp = ClassRegistry::init('Stamp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stamp);

		parent::tearDown();
	}

}
