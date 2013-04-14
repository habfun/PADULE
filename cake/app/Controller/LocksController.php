<?php
App::uses('AppController', 'Controller');
/**
 * Locks Controller
 *
 * @property Lock $Lock
 */
class LocksController extends AppController {

    var $uses = array('Lock','User','Event','JobSeeker','Schedule');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lock->recursive = 0;
		$this->set('locks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Lock->id = $id;
		if (!$this->Lock->exists()) {
			throw new NotFoundException(__('Invalid lock'));
		}
		$this->set('lock', $this->Lock->read(null, $id));
	}

	public function api_add() {
		//pr($this->data);
		$error = null;
		$this->JobSeeker->begin();
		$success = true;
		if(!$this->JobSeeker->save($this->request->data['JobSeeker'])) {
			$success = false;
		}
		if($success) {
			$JobSeekerId = $this->JobSeeker->getLastInsertId();
			foreach ($this->request->data['Lock'] as $key => $value) {
				$value['job_seeker_id'] = $JobSeekerId;
				$this->Lock->create();
				if (!$this->Lock->save($value)) {
					$success = false;
				}
			}
		}

		if($success) {
			$this->JobSeeker->commit();
 			$env['success'] = true;
		} else {
			$this->JobSeeker->rollback();
			$env['success'] = false;
		}

		$this->set(compact('env'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add($eventId = null) {
		$this->autoLayout = false;

		if($eventId == null) {
			$this->redirect('/');
		}
		if ($this->request->is('post')) {
			//pr($this->data);
			$error = null;
			$this->JobSeeker->save($this->request->data['JobSeeker']);
			$JobSeekerId = $this->JobSeeker->getLastInsertId();
			foreach ($this->request->data['Lock'] as $key => $value) {
				$value['job_seeker_id'] = $JobSeekerId;
				$this->Lock->create();
				if ($this->Lock->save($value)) {
					
				} else {
					$error = 'error';
				}
			}
			if(empty($error)) {
				$this->autoLayout = true;
				$this->flash(__('登録を受け付けました。'), array('controller' => 'pages','action' => 'index'));
			}
		}
		//グループ、スケジュールを取得
		/*
		$params = array(
			'conditions' => array(
				'Group.id' => $group_id,
			//	'Schedule.complete' =>0,
			),
			'recursive' => 3
		);
		*/
		$this->Event->bindModel(
            array(
                'hasMany' => array(
                    'Schedule' => array(
                        'className' => 'Schedule',
                        'foreignKey' => 'event_id',
                        'dependent' => false,
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                    )
                )
            )
        );
		$group = $this->Event->findById($eventId);
		//pr($group);

		$schedules = $this->Schedule->find('list');
		$this->set(compact('group'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Lock->id = $id;
		if (!$this->Lock->exists()) {
			throw new NotFoundException(__('Invalid lock'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lock->save($this->request->data)) {
				$this->flash(__('The lock has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Lock->read(null, $id);
		}
		$schedules = $this->Lock->Schedule->find('list');
		$jobSeekers = $this->Lock->JobSeeker->find('list');
		$this->set(compact('schedules', 'jobSeekers'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Lock->id = $id;
		if (!$this->Lock->exists()) {
			throw new NotFoundException(__('Invalid lock'));
		}
		if ($this->Lock->delete()) {
			$this->flash(__('Lock deleted'), array('action' => 'index'));
		}
		$this->flash(__('Lock was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}

	public function approval ($lockId) {

		$params = array(
			'conditions' =>array(
				'Lock.id' => $lockId
			),
			'recursive' => 2
		);
		$lock = $this->Lock->find('first',$params);

		$lock['Lock']['approval'] = true;
		$this->Lock->save($lock['Lock']);

		$lock['Schedule']['complete'] = true;
		$this->Schedule->save($lock['Schedule']);

		$lock['JobSeeker']['complete'] = true;
		$this->JobSeeker->save($lock['JobSeeker']);

		$this->redirect(array('controller' => 'schedules','action' => 'view',0 => $lock['Schedule']['Group']['id']));
	}
}
