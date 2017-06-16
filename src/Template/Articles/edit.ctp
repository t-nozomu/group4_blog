<div>
    <div class="edit_t"><h1>Edit Article</h1></div>
    <div class="edit_box">
        <?= $this->Form->create($article) ?>
        <div class="edit_title"><?= $this->Form->control('title') ?></div>
        <div class="edit_contents"><?= $this->Form->control('Contents', ['rows' => '3']) ?></div>
        <?= $this->Form->button(__('Save Article')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
