<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
<<<<<<< HEAD
=======
    //src/Controller/ArticlesController.php
    //モデルとのビジネスロジックを含み、投稿記事に関連する作業を行う場所
>>>>>>> 4ea5407f53dd1cdd0a72bad5a064f262b9337744

use App\Controller\AppController;

class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

<<<<<<< HEAD
    public function index()
    {
        $this->set('articles', $this->Articles->find('all'));
    }

=======
        public function index() {
            // $articles = $this->Articles->find('all'); modelのarticlesという変数をもってくる
            // $this->set(compact('articles')); //set()を使い、controller から viewにデータを渡す
            $this->set('articles', $this->Articles->find('all'));
        }
>>>>>>> 4ea5407f53dd1cdd0a72bad5a064f262b9337744
    public function view($id)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
<<<<<<< HEAD
=======
        public function view($id) {
            $article = $this->Articles->get($id);
            $this->set(compact('article'));
        }

        public function add() {
            $article = $this->Articles->newEntity();
            if ($this->request->is('post')) {
                $article = $this->Articles->patchEntity($article, $this->request->getData());
                $article->user_id = $this->Auth->user('id');
                //$newData = ['user_id' => $this->Auth->user('id')];
                //$article = $this->Articles->patchEntity($article, $newData);
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your article.'));
            }
            $this->set('article', $article);

            // Just added the categories list to be able to choose
            // one category for an article
            //$categories = $this->Articles->Categories->find('treeList');
            //$this->set(compact('categories'));
        }

        public function edit($id = null) {
            $article = $this->Articles->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->getData());
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
>>>>>>> 4ea5407f53dd1cdd0a72bad5a064f262b9337744
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }
    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('article', $article);
    }
    public function delete($id)
{
    $this->request->allowMethod(['post', 'delete']);

    $article = $this->Articles->get($id);
    if ($this->Articles->delete($article)) {
        $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'index']);
    }
}
}

?>
