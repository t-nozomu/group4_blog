<!-- File: src/Template/Articles/add.ctp -->
<?= $this->Html->css('add_style.css') ?>
<body class="haikei">
<div class="add_t"><h1>Add Article</h1></div>
<div class="add_box">
    <?= $this->Form->create($article) ?>
    <div class="add_title"><?= $this->Form->control('title',['maxlength'=>20]) ?></div>
    <div class="add_body"><?= $this->Form->control('body', ['rows' => '20','cols'=>'62','label'=>'Contents']) ?></div>
    <div class="add_box1">
        <div><?= $this->Form->button(__('Add'),['onclick'=>'return double(this)']) ?></div>
        <?= $this->Form->end() ?>
        <?= $this->Form->create(null,['url'=>['controller'=>'articles','action' => 'index']]) ?>
        <div><?= $this->Form->button('Back',['class'=>'HelperButton']) ?></div>
        <?= $this->Form->end() ?>
    </div>
</div>
</body>
<script type="text/javascript">
    function double(a){
        a.disabled = true;
        a.form.submit();
    }
</script>
