<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<p><?= h($article->body) ?></p>

<!--heyheyhey-->

<br>
<br>
<h1>Comment</h1>
<?php
    echo $this->Form->input('タイトル');
    echo $this->Form->input('本文', ['rows' => '3']);
    echo $this->Form->input('pass');
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>
