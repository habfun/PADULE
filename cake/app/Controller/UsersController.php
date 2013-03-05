<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

var $uses = array('User','Group');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(empty($this->login)) {
			$this->redirect('/');
		}
		pr($this->User->findById($login));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$userId = $this->User->getLastInsertId();
				//$this->Session->write('login',$userId);
				$this->redirect(array('controller' => 'users','action' => 'complete'));
			} else {

			}
		}
	}

	public function login() {
        if($this->login) {
            return $this->redirect(array('controller' => 'schedules','action' => 'index'));
        }
        if($this->request->is('post')) {
        	$user = $this->User->find('first',array('conditions' => array('username' => $this->request->data['User']['username'],'password' => $this->request->data['User']['password'])));
            if(!empty($user)) {
				$this->Session->write('login',$user['User']['id']);
                return $this->redirect(array('controller' => 'schedules','action' => 'index'));
            } else {
                return $this->redirect(array('controller' => 'users','action' => 'login'));
            }
        }
    }
    public function complete() {
    	
	}
	public function logout() {
		$this->Session->delete('login');
		$this->redirect('/');
	}
}
