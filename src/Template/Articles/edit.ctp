

<div>
    <div class="edit_t"><h1>Edit Article</h1></div>
    <div class="edit_box">
        <?= $this->Form->create($article) ?>
        <div class="edit_title"><?= $this->Form->control('title') ?></div>
        <div class="edit_contents"><?= $this->Form->control('body', ['rows' => '27','cols'=>'62']) ?></div>
        <div class="edit_box1">
            <?= $this->Form->button(__('Save Article')) ?>
            <?= $this->Form->end() ?>

            <?= $this->Form->create() ?>
            <?= $this->Form->button('戻る',array('onclick' => 'history.back(); return false;')) ?>
            <?= $this->Form->end() ?>

            <?=$this->Form->postButton('更新',
                ['action' => 'view', $article->id],
                ['confirm' => 'この内容で記事を更新しても宜しいですか？
                ※yesをクリックすると編集内容が反映されます'])
                ?>
        </div>
    </div>
</div>
