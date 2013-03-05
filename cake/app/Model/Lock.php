<?php
App::uses('AppModel', 'Model');
/**
 * Lock Model
 *
 * @property Schedule $Schedule
 * @property JobSeeker $JobSeeker
 */
class Lock extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Locks';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'schedule_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'job_seeker_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Schedule' => array(
			'className' => 'Schedule',
			'foreignKey' => 'schedule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'JobSeeker' => array(
			'className' => 'JobSeeker',
			'foreignKey' => 'job_seeker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
