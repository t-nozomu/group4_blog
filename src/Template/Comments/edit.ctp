<!-- File: src/Template/Articles/edit.ctp -->
<?= $this->Html->css('CommentsEdit_style.css') ?>
<h1 class="cedit_title">Edit Comment</h1>
    <div class="cedit_box">
        <div><?= $this->Form->create($comment) ?></div>
        <div class="cedit_name"><?= $this->Form->control('handlename') ?></div>
        <div class="cedit_body"><?= $this->Form->control('body', ['rows' => '7', 'cols' => '80']) ?></div>
        <div class="cedit_pass"><?= $this->Form->control('password')?></div>

    <div class="cedit_button">
        <div><?= $this->Form->button(__('投稿')) ?></div>
        <div><?= $this->Form->button('戻る',array('onclick' => 'history.back(); return false;')) ?></div>
    </div>

        <div><?= $this->Form->end() ?></div>

    </div>
