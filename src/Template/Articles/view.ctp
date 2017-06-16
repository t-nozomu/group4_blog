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
    echo  $this->Form->input('password',array('placeholder' => "任意のパスワードを入力してください"));
    echo "※このパスワードはコメント修正、削除時に必要になります。<br />";
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>

<h1>Comment</h1>
<div>
    <div>
        <div>Id</div>
        <div>handlename</div>
        <div>created</div>
        <div>body</div>
        <div><?php if( is_null($auth) ): ?>action<?php endif; ?></div>
    </div>
            <?php foreach ($article->comments as $comment): ?>
    <div>
        <div><?= $comment->id ?></div>
        <div><?= $comment->handlename ?></div>
        <div><?= $comment->created->format('Y年m月d日 H:i:s') ?></div>
        <div><?= $comment->body ?></div>
        <div>
            <?php if( is_null($auth) ): ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['controller'=>'comments','action' => 'delete', $comment->id],
                    ['confirm' => 'Are you sure?'])
                ?>
            <?php endif; ?>
            <?= $this->Html->link('Edit', ['controller'=>'comments','action' => 'edit', $comment->id]) ?>
        </div>
    </div>
            <?php endforeach; ?>
</div>
