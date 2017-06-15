<!-- File: src/Template/Articles/edit.ctp -->

<h1>Edit Comment</h1>
<?php
    echo $this->Form->create($comment);
    echo $this->Form->control('handlename');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->control('password');
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
