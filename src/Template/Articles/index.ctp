
<!-- File: src/Template/Articles/index.ctp (delete links added) -->

<h1 class=title_name>Fuckin Blog</h1>
<p><?= $this->Html->link('投稿', ['action' => 'add']) ?></p>
<div>
    <div class="div_main div_color">
        <div class="div_id">Id</div>
        <div class="div_title">Title</div>
        <div class="div_created">Created</div>
        <div class="div_actions">Actions</div>

    </div>

<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->

    <?php foreach ($articles as $article): ?>
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
