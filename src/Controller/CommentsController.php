<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[] paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'edit', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $comments = $this->paginate($this->Comments);

        $this->set(compact('comments'));
        $this->set('_serialize', ['comments']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);

        $this->set('comment', $comment);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
         $comment = $this->Comments->newEntity($this->request->data);
        if ($this->request->is('post')) {
            //$comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
            }

            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
        }
        $this->set(compact('comment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id);
        if(!isset($this->request->data['handlename'])){
            if(isset($this->request->data['password'])){
                if($this->request->data['password'] === $comment->password){
                    $this->Flash->success(__('Password authentication completed.'));
                }
                else{
                    $this->Flash->error(__('The password is incorrect.'));
                    return $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
                }
            }
            else{
                $this->Flash->error(__('Confirm unauthorized access'));
                return $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
            }

        }
        else{
            if ($this->request->is(['patch', 'post', 'put'])) {
                $comment = $this->Comments->patchEntity($comment, $this->request->getData());
                if ($this->Comments->save($comment)) {
                    $this->Flash->success(__('The comment has been saved.'));

                    return $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
                }
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('comment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if($this->request->data['password'] === $comment->password){
            if ($this->Comments->delete($comment)) {
                $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            }
            else {
                $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
            }
        }
        else{
            $this->Flash->error(__('パスワードに誤りがあります'));
        }
        return $this->redirect(['controller'=>'articles','action' => 'view',$comment->article_id]);
    }
}
