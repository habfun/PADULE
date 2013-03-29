<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

var $uses = array('User');

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

    /*
    $Email = new CakeEmail();
    $Email->from(array('k.moromizato@moro.local' => 'My Site'));
    $Email->to('k.moromizato@gmail.com');
    $Email->subject('About');
    $Email->send('My message');
    */

            if($this->Auth->user()) {
                return $this->redirect($this->Auth->redirect());
            }
            if($this->request->is('post')) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
                }
            }
        }
        public function complete() {
        	
    	}
    	public function logout() {
    	   $this->redirect($this->Auth->logout());
    	}

        public function api_view($userId = null) {

        }
    }
