<!-- File: src/Template/Articles/add.ctp -->
<?= $this->Html->css('add_style.css') ?>
<div class="add_t"><h1>Add Article</h1></div>
<div class="add_box">
    <?= $this->Form->create($article) ?>
    <div class="add_title"><?= $this->Form->control('title',['maxlength'=>20]) ?></div>
    <div class="add_body"><?= $this->Form->control('body', ['rows' => '27','cols'=>'62','label'=>'Contents']) ?></div>
    <div class="add_box1">
        <div><?= $this->Form->button(__('Add'),['onclick'=>'return double(this)']) ?></div>
        <div><?= $this->Form->button('Back',array('onclick' => 'history.back(); return false;')) ?></div>
    </div>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    function double(a){
        a.disabled = true;
        a.form.submit();
    }
</script>
