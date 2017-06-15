<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1>Blog articles</h1>
<?php if( is_null($auth) ): ?>
    <p><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?></p>
    <?php else: ?>
        <p><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></p>
<?php endif; ?>

<?php if( !is_null($auth) ): ?>
    <p><?= $this->Html->link('投稿', ['action' => 'add']) ?></p>
<?php endif; ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Comments</th>
        <th>Created</th>
        <th><?php if( !is_null($auth) ): ?>Actions<?php endif; ?></th>
    </tr>

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
    <?php endforeach; ?>

</table>
