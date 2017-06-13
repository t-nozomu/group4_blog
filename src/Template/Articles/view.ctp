<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p> <?= $article->created->format('Y年m月d日 H:i:s') ?></p>
<p><?= h($article->body) ?></p>

<!--heyheyhey-->

<br>
<br>
<h1>コメント</h1>
<?php
    echo $this->Form->input('タイトル');
    echo $this->Form->input('本文', ['rows' => '3']);
    echo $this->Form->input('パスワード');
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>
