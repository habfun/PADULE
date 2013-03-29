<?php
App::uses('JobSeeker', 'Model');

/**
 * JobSeeker Test Case
 *
 */
class JobSeekerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.job_seeker',
		'app.lock',
		'app.schedule',
		'app.group',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->JobSeeker = ClassRegistry::init('JobSeeker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JobSeeker);

		parent::tearDown();
	}

}
