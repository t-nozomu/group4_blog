<!-- File: src/Template/Articles/add.ctp -->

<h1>記事投稿</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('タイトル');
    echo $this->Form->control('本文', ['rows' => '3']);
    echo $this->Form->button(__('投稿'));
        echo $this->Form->button(__('戻る'));
    echo $this->Form->end();
?>
