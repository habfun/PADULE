<?php
App::uses('AppModel', 'Model');
/**
 * Lock Model
 *
 * @property JobSeeker $JobSeeker
 * @property Schedule $Schedule
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
/*
	public $belongsTo = array(
		'JobSeeker' => array(
			'className' => 'JobSeeker',
			'foreignKey' => 'job_seeker_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Schedule' => array(
			'className' => 'Schedule',
			'foreignKey' => 'schedule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
*/
}
