<?php
App::uses('TmpUser', 'Model');

/**
 * TmpUser Test Case
 *
 */
class TmpUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tmp_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TmpUser = ClassRegistry::init('TmpUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TmpUser);

		parent::tearDown();
	}

}
