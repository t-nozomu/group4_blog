<div class="login_logout_button">
<body class="haikei">
    <?php if( is_null($auth) ): ?>
        <div class="login_button"><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'],['class'=>'link_color']) ?></div>
        <?php else: ?>
            <div class="logout_button"><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'],['class'=>'link_color']) ?></div>
        <?php endif; ?>
</div>


<div class="div_box10">
<!-- File: src/Template/Articles/index.ctp (delete links added) -->
<?php if( !is_null($auth) ): ?>
    <div><?= $this->Html->link('Add artcles', ['action' => 'add'],['class'=>'link_color']) ?></div>
<?php endif; ?>
</div>
<div class="div_box">

    <div class="div_main div_color">
        <div class="div_id">Id</div>
        <div class="div_title">Title</div>
            <div class="div_comments">Comments</div>
                <div class="div_created">Time</div>
        <div class="div_actions"><?php if( !is_null($auth) ): ?>Actions<?php endif; ?></div>
    </div>


<!-- ここで $articles クエリオブジェクトをループして、投稿情報を表示 -->
<div>
    <?php foreach ($articles as $article): ?>
    <div class="div_main div_box1">
        <div class="div_id"><?= $article->id ?></div>
        <div class="div_title">
            <span class="titles"><?= $this->Html->link($article->title, ['action' => 'view', $article->id],['class'=>'link_color']) ?></span>
        </div>
                <div class="div_comments"><?= count($article->comments) ?></div>
        <div class="div_created">
            <?= $article->modified->format('Y年m月d日 H:i:s') ?>
        </div>
        <div class="div_actions">
            <?php if( !is_null($auth) ): ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->id],
                    ['confirm' => "No."."$article->id"."の「"."$article->title"."」を削除しますか？"])
                ?>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $article->id],['class'=>'link_color']) ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</body>
