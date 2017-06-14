<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p> <?= $article->created->format('Y年m月d日 H:i:s') ?></p>
<p><?= h($article->body) ?></p>

<?=
 $this->Form->postLink(
     '記事一覧へ',
     ['action' => 'index'])
?>
<!--heyheyhey-->
<br>
<br>
<h1>コメント</h1>
<?php
    echo $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]);
    echo $this->Form->input('handlename');
    echo $this->Form->input('Contents', ['rows' => '3']);
    echo $this->Form->input('password');
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>
