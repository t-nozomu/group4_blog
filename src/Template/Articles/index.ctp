<h1 class=title_name>Blog articles</h1>
<?php if( is_null($auth) ): ?>
    <p><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?></p>
    <?php else: ?>
        <p><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></p>
<?php endif; ?>
<?php if( !is_null($auth) ): ?>
    <p><?= $this->Html->link('投稿', ['action' => 'add']) ?></p>
<?php endif; ?>


<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<div class="div_box">
    <div class="div_main div_color">
        <div class="div_id">Id</div>
        <div class="div_title">Title</div>
            <div class="div_comments">Comments</div>
                <div class="div_created">Created</div>
        <div class="div_actions"><?php if( !is_null($auth) ): ?>Actions<?php endif; ?></div>
    </div>


<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->
<div>
    <?php foreach ($articles as $article): ?>
    <div class="div_main div_box1">
        <div class="div_id"><?= $article->id ?></div>
        <div class="div_title">
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </div>
                <div class="div_comments"><?= count($article->comments) ?></div>
        <div class="div_created">
            <?= $article->created->format('Y年m月d日 H:i:s') ?>
        </div>
        <div class="div_actions">
            <?php if( !is_null($auth) ): ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->id],
                    ['confirm' => "No."."$article->id"."の「"."$article->title"."」を削除しますか？"])
                ?>
                    <span class="edit_color"><?= $this->Html->link('Edit', ['action' => 'edit', $article->id],['class'=>'edit_color']) ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
