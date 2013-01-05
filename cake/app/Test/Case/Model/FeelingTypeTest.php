<?php
App::uses('FeelingType', 'Model');

/**
 * FeelingType Test Case
 *
 */
class FeelingTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feeling_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FeelingType = ClassRegistry::init('FeelingType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FeelingType);

		parent::tearDown();
	}

}
