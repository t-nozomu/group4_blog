<h1 class=title_name>Blog articles</h1>
<?php if( is_null($auth) ): ?>
    <p><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?></p>
    <?php else: ?>
        <p><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></p>
<?php endif; ?>
<?php if( !is_null($auth) ): ?>
    <p><?= $this->Html->link('投稿', ['action' => 'add']) ?></p>
<?php endif; ?>
<div>
    <div class="div_main div_color">
        <div class="div_id">Id</div>
        <div class="div_title">Title</div>
        <div class="div_created">Created</div>
        <div class="div_actions">Actions</div>

    </div>


<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->

    <?php foreach ($articles as $article): ?>

    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id])?>

        </td>
        <td>
            <?= count($article->comments) ?>
        </td>
        <td>
            <?= $article->created->format('Y年m月d日 H:i:s') ?>
        </td>

        <td>
            <?php if( !is_null($auth) ): ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->id],
                    ['confirm' => 'Are you sure?'])
                    ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
            <?php endif; ?>
        </td>

    </tr>

    <div class="div_main">
        <div class="div_id"><?= $article->id ?></div>
        <div class="div_title">
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </div>
        <div class="div_created">
            <?= $article->created->format('Y年m月d日 H:i:s') ?>
        </div>
        <div class="div_actions">
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <span class="edit_color"><?= $this->Html->link('Edit', ['action' => 'edit', $article->id],['class'=>'edit_color']) ?></span>
        </div>
    </div>

    <?php endforeach; ?>


</div>
