<?php
    //src/Controller/ArticlesController.php
    //モデルとのビジネスロジックを含み、投稿記事に関連する作業を行う場所

    namespace App\Controller; //名前空間: クラス/関数/定数の名前衝突を避けるために用いられる

    use App\Controller\AppController;

    /*ArticlesController の中に index() という関数を定義することによって、
    ユーザは、 www.example.com/articles/index というリクエストで、そのロジックにアクセスできる*/
    //アクションの追加: アクションは、 アプリケーションの中のひとつの関数か、インターフェイスを表す
    class ArticlesController extends AppController {
        public function initialize() {
            parent::initialize();

            $this->loadComponent('Flash'); // Include the FlashComponent
        }

        public function index() {
            // $articles = $this->Articles->find('all'); modelのarticlesという変数をもってくる
            // $this->set(compact('articles')); //set()を使い、controller から viewにデータを渡す
            $this->set('articles', $this->Articles->find('all'));
        }


        public function view($id)
        {
            //$article = $this->Articles->get($id);
            $article = $this->Articles->find('all')->contain(['Comments'])->where(['id'=>$id])->first();
            $this->set('article',$article);
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
    }

<<<<<<< HEAD
        public function edit($id = null) {
            $article = $this->Articles->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->getData());
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
=======
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
>>>>>>> origin/tamura_nozomu
            }

            $this->set('article', $article);
        }
<<<<<<< HEAD

        public function delete($id)
        {
            $this->request->allowMethod(['post', 'delete']);

            $article = $this->Articles->get($id);
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
                return $this->redirect(['action' => 'index']);
            }
=======
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
>>>>>>> origin/tamura_nozomu
        }

        public function isAuthorized($user)
        {
            // All registered users can add articles
            if ($this->request->getParam('action') === 'add') {
                return true;
            }

            // The owner of an article can edit and delete it
            if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
                $articleId = (int)$this->request->getParam('pass.0');
                if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                    return true;
                }
            }

            return parent::isAuthorized($user);
        }
    }
 ?>
