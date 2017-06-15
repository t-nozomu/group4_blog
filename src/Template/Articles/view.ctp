<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<p> <?= $article->created->format('Y年m月d日 H:i:s') ?></p>
<p> <?php echo nl2br(h($article->body)) ?></p>

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
 <th>Id</th>
 <th>handlename</th>
 <th>created</th>
 <th>body</th>
 <th><?php if( is_null($auth) ): ?>action<?php endif; ?></th>
 </tr>
 <?php foreach ($article->comments as $comment): ?>
 <tr>
 <td><?= $comment->id ?></td>
 <td><?= $comment->handlename ?></td>
 <td><?= $comment->created->format('Y年m月d日 H:i:s') ?></td>
 <td><?= $comment->body ?></td>
 <td>
    <?php if( is_null($auth) ): ?>
    <?= $this->Form->postLink(
        'Delete',
        ['controller'=>'comments','action' => 'delete', $comment->id],
        ['confirm' => 'Are you sure?'])
    ?>
    <?php endif; ?>
     <?= $this->Html->link('Edit', ['controller'=>'comments','action' => 'edit', $comment->id]) ?>
 </td>
 </tr>
 <?php endforeach; ?>
</table>
