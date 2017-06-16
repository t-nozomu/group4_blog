<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<!--heyheyhey-->
<br>
<br>
<h1>コメント</h1>
<?php
    echo $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]);
    echo $this->Form->input('handlename');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->input('password');
    echo $this->Form->button(__('投稿'));
    echo $this->Form->hidden('article_id',array('value'=>$article->id));
    echo $this->Form->end();
?>

<h1>Comment</h1>
<table>
 <tr>
 <th>handlename</th>
 <th>body</th>
 </tr>
 <?php foreach ($article->comments as $comment): ?>
 <tr>
 <td><?= $comment->handlename ?></td>
 <td><?= $comment->body ?></td>
 <td>
     <a href="javascript:Dellog()">Delete</a>
     <a href="javascript:Editlog()">Edit</a>
 </td>
 </tr>
 <?php endforeach; ?>
</table>
<script type="text/javascript">
    function Dellog(){
            //window.alert("aaaaaaaa");
            pswd = window.prompt("パスワード入力","");
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

    function Editlog(){
            //window.alert("aaaaaaaa");
            pswd = window.prompt("パスワード入力","");
            var form = document.createElement('form');
            document.body.appendChild( form );
            var input = document.createElement('input');
            input.setAttribute('type','hidden');
            input.setAttribute('name',password);
            input.setAttribute('value',pswd);
            form.appendChild(input);
            form.setAttribute('action' , '/group4_blog/comments/edit/<?= $comment->id ?>');
            form.setAttribute('method','post');
            form.submit();

    }
</script>
