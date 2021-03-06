<!-- File: src/Template/Articles/edit.ctp -->
<?= $this->Html->css('CommentsEdit_style.css') ?>
<body class="haikei">
<h1 class="cedit_title">Edit Comment</h1>
    <div class="cedit_box">
        <div><?= $this->Form->create($comment) ?></div>
        <div class="cedit_name"><?= $this->Form->control('handlename') ?></div>
        <div class="cedit_body"><?= $this->Form->control('body', ['rows' => '7', 'cols' => '80','label'=>'Contents']) ?></div>

    <div class="cedit_button">
        <div><?= $this->Form->button(__('Add'),['onclick'=>'return double(this)']) ?></div>
        <div><?= $this->Form->button('Back',array('onclick' => 'history.back(); return false;')) ?></div>
    </div>

        <div><?= $this->Form->end() ?></div>

    </div>
</body>
    <script type="text/javascript">
        function double(a){
            a.disabled = true;
            a.form.submit();
        }
    </script>
