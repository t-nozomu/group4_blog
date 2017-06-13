<!-- File: src/Template/Articles/add.ctp -->

<h1>記事投稿</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('投稿'));
    echo $this->Form->end();

    echo $this->Form->create();
    echo $this->Form->button('戻る',array('onclick' => 'history.back(); return false;'));
    echo $this->Form->end();

?>
