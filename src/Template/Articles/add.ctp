<!-- File: src/Template/Articles/add.ctp -->
<?= $this->Html->css('add_style.css') ?>
<div class="add_t"><h1>Add Article</h1></div>
<div class="add_box">
    <?= $this->Form->create($article) ?>
    <div class="add_title"><?= $this->Form->control('title') ?></div>
    <div class="add_body"><?= $this->Form->control('body', ['rows' => '27','cols'=>'62']) ?></div>
    <div class="add_box1">
        <div><?= $this->Form->button(__('Add')) ?></div>
        <div><?= $this->Form->button('Back',array('onclick' => 'history.back(); return false;')) ?></div>
    </div>
    <?= $this->Form->end() ?>
</div>
