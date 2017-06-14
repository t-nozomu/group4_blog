<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p><small>Created: <?= $article->created->format('Y年m月d日 H:i:s') ?></small></p>
<p><?= h($article->body) ?></p>

<!--heyheyhey-->
<br>
<br>
<h1>コメント</h1>
<?php
    echo $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]);
    echo $this->Form->input('handlename');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->input('password');
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>

<h1>Comment</h1>
<table>
 <tr>
 <th>handlename</th>
 <th>body</th>
 </tr>
 <?php foreach ($article->comments as $comment): ?>
 <tr>
 <td><?= $comment->handlename ?></td>
 <td><?= $comment->body ?></td>
 </tr>
 <?php endforeach; ?>
</table>
