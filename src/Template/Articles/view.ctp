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
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->input('password');
    echo "※このパスワードはコメント修正、削除時に必要になります。<br />";
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>

<h1>Comment</h1>
<table>
 <tr>
 <th>handlename</th>
 <th>created</th>
 <th>body</th>
 </tr>
 <?php foreach ($article->comments as $comment): ?>
 <tr>
 <td><?= $comment->handlename ?></td>
 <td><?= $comment->created->format('Y年m月d日 H:i:s') ?></td>
 <td><?= $comment->body ?></td>
 <td>
 <?= $this->Form->postLink(
     'Delete',
     ['controller'=>'comments','action' => 'delete', $comment->id],
     ['confirm' => 'Are you sure?'])
     ?>
     <?= $this->Html->link('Edit', ['controller'=>'comments','action' => 'edit', $comment->id]) ?>
 </td>
 </tr>
 <?php endforeach; ?>
</table>
