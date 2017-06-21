
<body class="haikei">
<div>
    <div class="edit_t"><h1>Edit Article</h1></div>
    <div class="edit_box">
        <?= $this->Form->create($article) ?>
        <div class="edit_title"><?= $this->Form->control('title') ?></div>
        <div class="edit_contents"><?= $this->Form->control('body', ['rows' => '27','cols'=>'62','label'=>'Contents']) ?></div>
        <div class="edit_box1">
            <?= $this->Form->button(__('Save Article'),,['onclick'=>'return double(this)']) ?>
            <?= $this->Form->end() ?>

            <?= $this->Form->create(null,['url'=>['controller'=>'articles','action' => 'view', $article->id]]) ?>
            <?= $this->Form->button('Back',['class'=>'HelperButton']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    function double(a){
        a.disabled = true;
        a.form.submit();
    }
</script>
