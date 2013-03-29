<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

    public $uses = array('Event');

    public function api_index() {

        $events = array();
        if($userId = $this->Auth->user('id')) {

            $params = array(
                'conditions' => array(
                    'Event.user_id' => $userId
                )
            );
            $events = $this->Event->find('all',$params);
        }
        $env['success'] = true;

        $this->set(compact('events','env'));
    }

    public function api_view($eventId) {

        $event = array();
        $params = array(
            'conditions' => array(
                'Event.user_id' => $userId,
                'Event.id' => $eventId
            )
        );
        $event = $this->Event->find('first',$params);
        $env['success'] = true;

        $this->set(compact('event','env'));
    }

    public function api_new() {

        $this->request->data['title'] = 'title';
        $this->request->data['datetime'] = '2012-01-01 20:20:20';
        $this->request->data['text'] = '詳細';

        $title = $this->request->data['title'];
        $datetime = $this->request->data['datetime'];
        $text = $this->request->data['text'];

        $rand =  md5(uniqid(rand(), true));
        $url = '/locks/add/'.$rand;

        $savedata = array(
            'user_id' => $this->Auth->user('id'),
            'title' => $title,
            'datetime' => $datetime,
            'url' => $url
        );

        if($this->Event->save($savedata)) {
            $env['success'] = true;
        } else {
            $env['success'] = false;
        }

        $this->set(compact('env'));

    }

    public function padule() {

    }
}
