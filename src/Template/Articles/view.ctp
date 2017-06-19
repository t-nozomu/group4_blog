<!-- File: src/Template/Articles/view.ctp -->
<h1><?= h($article->title) ?></h1>
<td>
    <?= $this->Form->postLink(
        'Delete',
        ['action' => 'delete', $article->id],
        ['confirm' => 'Are you sure?'])
    ?>
    <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
</td>
<p> <?= $article->created->format('Y年m月d日 H:i:s') ?></p>
<p> <?php echo nl2br(h($article->body)) ?></p>

<?=
 $this->Form->postLink(
     '記事一覧へ',
     ['action' => 'index'])
?>
<!--heyheyhey-->
<br>
<br>
<h1>コメント</h1>
<?php
    echo $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]);
    echo $this->Form->input('handlename');
    echo $this->Form->input('body', ['rows' => '3']);
    echo  $this->Form->input('password',array('placeholder' => "任意のパスワードを入力してください"));
    echo "※このパスワードはコメント修正、削除時に必要になります。<br />";
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>

<h1>Comment</h1>
<div>
    <div>
        <div>Id</div>
        <div>handlename</div>
        <div>created</div>
        <div>body</div>
        <div>action</div>
    </div>
            <?php foreach ($article->comments as $comment): ?>
    <div>
        <div><?= $comment->id ?></div>
        <div><?= $comment->handlename ?></div>
        <div><?= $comment->created->format('Y年m月d日 H:i:s') ?></div>
        <div><?= $comment->body ?></div>
        <div>
            <a href="javascript:Dellog()">Delete</a>
            <a href="javascript:Editlog()">Edit</a>
        </div>
    </div>
            <?php endforeach; ?>
</div>


<script type="text/javascript">
    function Dellog(){
            var pswd = prompt("パスワードを入力してください","");
            if(pswd.toLowerCase() != null){
            var form = document.createElement('form');
            document.body.appendChild( form );
            var input = document.createElement('input');
            input.setAttribute('type','hidden');
            input.setAttribute('name',password);
            input.setAttribute('value',pswd);
            form.appendChild(input);
            form.setAttribute('action' , '/group4_blog/comments/delete/<?= $comment->id ?>');
            form.setAttribute('method','post');
            form.submit();
        }
        else{
            window.alert("入力をキャンセルします");
        }

    }

    function Editlog(){
            //window.alert("aaaaaaaa");
            if(pswd = window.prompt("パスワード入力","")){
            var form = document.createElement('form');
            document.body.appendChild( form );
            var input = document.createElement('input');
            input.setAttribute('type','hidden');
            input.setAttribute('name',password);
            input.setAttribute('value',1234);
            form.appendChild(input);
            form.setAttribute('action' , '/group4_blog/comments/edit/<?= $comment->id ?>');
            form.setAttribute('method','post');
            form.submit();
        }
        else{
            window.alert("入力をキャンセルします");
        }

    }
</script>
