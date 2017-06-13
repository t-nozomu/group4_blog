<!-- File: src/Template/Articles/edit.ctp -->

<h1>記事編集</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('タイトル');
    echo $this->Form->control('本文', ['rows' => '3']);
    echo $this->Form->button(__('更新'));
    echo $this->Form->button(__('戻る'));
    echo $this->Form->end();
?>
