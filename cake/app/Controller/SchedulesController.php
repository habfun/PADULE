<?php
App::uses('AppController', 'Controller');
/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 */
class SchedulesController extends AppController {

var $uses = array('Schedule','Lock','Group','User','JobSeeker');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(empty($this->login)) {
			$this->redirect('/');
		}
		$group = $this->Group->find('all',array('conditions' => array('Group.user_id' => $this->login),'order' => 'Group.id desc'));

		$this->set('group',$group);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($group_id = null) {
		if(empty($this->login)) {
			$this->redirect('/');
		}
		$group = $this->Group->find('first',array('conditions'=>array('Group.id'=>$group_id),'recursive' => 2));
		$i = 0;
$days = array();
$times = array();
		foreach ($group['Schedule'] as $key => $value) {
			$splitStart = split(' ', $group['Schedule'][$i]['start_datetime']);
			$splitEnd = split(' ', $group['Schedule'][$i]['end_datetime']);

			$group['Schedule'][$i]['day'] = $splitStart[0];
			$days[$splitStart[0]] = "IN";
			$group['Schedule'][$i]['time'] = $splitStart[1].'〜'.$splitEnd[1];
			$times[$splitStart[1].'〜'.$splitEnd[1]] = "IN";


			$i++;
		}
		$this->set(compact('group','days','times'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if(empty($this->login)) {
			$this->redirect('/');
		}
		if ($this->request->is('post')) {
			pr($this->data);
			exit;
			$this->Schedule->create();
			if ($this->Schedule->save($this->request->data)) {
				$this->flash(__('Schedule saved.'), array('action' => 'index'));
			} else {
			}
		}
		$groups = $this->Schedule->Group->find('list');
		$this->set(compact('groups'));
	}
	public function newpadule() {
		if(empty($this->login)) {
			$this->redirect('/');
		}
		if ($this->request->is('post')) {
			$this->request->data['Group']['user_id'] = $this->login;

			if($this->Group->save($this->request->data['Group'])) {
				$groupId = $this->Group->getLastInsertId();
				foreach ($this->request->data['dates'] as $key => $value) {
					if(!empty($value)) {
						$this->Schedule->create();
						$tmpDate = split('&', $value);
						$startDate = $tmpDate[0];
						$endDate = $tmpDate[1];
						$saveData = array(
							'group_id' => $groupId,
							'start_datetime' => $startDate,
							'end_datetime' => $endDate,
						);
						$this->Schedule->save($saveData);
					}
				}

				$this->redirect(array('controller' => 'schedules','action' => 'complete','0' => $groupId));
			}
		}
	}
	public function complete($groupId) {
				$this->set('groupId',$groupId);
	}
	public function added() {

	}
}