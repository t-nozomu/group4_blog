<div class="add_t"><h1>Add Article</h1></div>
<div class="add_box">
    <?= $this->Form->create($article) ?>
    <div class="add_title"><?= $this->Form->control('title') ?></div>
    <div class="add_contents"><?= $this->Form->control('Contents', ['rows' => '3']) ?></div>
    <div><?= $this->Form->button(__('Add')) ?></div>
    <?= $this->Form->end() ?>
</div>
