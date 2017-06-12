<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController {
    //コントローラの各アクションの前に実行されます。
    //アクティブセッションのチェックや、ユーザー権限の検査をするために役立ちます。
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    public function index() {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id) {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public fuction add() {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));
            return $this->redirect(['action' => 'add']);
        }
        $this->Flash->error(__('Usable to add the user.'));
    }
    $this->set('user', $user);
}

 ?>
