<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

    public $uses = array('Event','JobSeeker');

    public function api_index() {

        $userId = $this->Auth->user('id');
        $params = array(
            'conditions' => array(
                'Event.user_id' => $userId
            ),
            'recursive' =>0
        );
        $events = $this->Event->find('all',$params);
        $env['success'] = true;

        $this->set(compact('events','env'));
    }

    public function api_view($eventId) {

        $userId = $this->Auth->user('id');
        $this->Event->bindModel(
            array(
                'hasMany' => array(
                    'JobSeeker' => array(
                        'className' => 'JobSeeker',
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
                    ),
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

        $this->JobSeeker->bindModel(
            array(
                'hasMany' => array(
                    'Lock' => array(
                        'className' => 'Lock',
                        'foreignKey' => 'job_seeker_id',
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
        $event = array();
        $params = array(
            'conditions' => array(
                'Event.user_id' => $userId,
                'Event.id' => $eventId
            ),
            'recursive' =>3
        );
        $event = $this->Event->find('first',$params);
        $env['success'] = true;

        $this->set(compact('event','env'));
    }

    public function api_new() {

        $title = $this->request->data['title'];
        $datetime = $this->request->data['datetime'];
        $text = $this->request->data['text'];

        $rand =  md5(uniqid(rand(), true));
        $url = '/locks/add/'.$rand;

        $savedata = array(
            'user_id' => $this->Auth->user('id'),
            'title' => $title,
            'datetime' => $datetime,
            'text' => $text,
            'url' => $url
        );

        if($this->Event->save($savedata)) {
            $env['success'] = true;
        } else {
            $env['success'] = false;
        }

        $this->set(compact('env'));

    }

    public function api_edit() {

        $json = '
        [
    {
        "id": 1, 
        "schedule_id": 1
    }, 
    {
        "id": 2, 
        "schedule_id": 1
    }
]
';
$posts = json_decode($json, true);
pr($posts);

        foreach ($posts as $key => $value) {
            $savedata = array(
                'id' => $value['schedule_id'],
                'job_seeker_id' => $value['id'],
            );
        }
        $savedata = array(
            'user_id' => $this->Auth->user('id'),
            'title' => $title,
            'datetime' => $datetime,
            'text' => $text,
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
