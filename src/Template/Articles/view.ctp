
<?= $this->Html->css('view_style.css') ?>
<div class="view_box">
    <div><?= h($article->title) ?></div>
    <div class="view_box1">
        <div><?= $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $article->id],
            ['confirm' => 'Are you sure?'])?>
        </div>
        <div><?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?></div>
    </div>
        <div> <?= $article->created->format('Y年m月d日 H:i:s') ?></div>
        <div> <?php echo nl2br(h($article->body)) ?></div>

        <div><?= $this->Form->postLink(
            '記事一覧へ',
            ['action' => 'index'])?>
        </div>
</div>
<!--heyheyhey-->
<br>
<div class="view_box2">

    <?= $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]) ?>
    <?= $this->Form->input('Name') ?>
    <div class="view_body1"><?= $this->Form->input('body', ['rows' => '7', 'cols' => '80']) ?></div>
    <div>
        <div><?=  $this->Form->input('password',array('placeholder' => "任意のPassを入力してください")) ?> </div>
        <div><?= "※このパスワードはコメント修正、削除時に必要になります。<br />" ?> </div>
    </div>

    <?= $this->Form->button(__('投稿')) ?>
    <?= $this->Form->hidden('article_id',array('value'=>$article->id)) ?>
    <?= $this->Form->end() ?>

</div>

<br>
<div class="view_box3">
<div>Comment</div>
    <div>
        <div class="view_comment">
            <div>Id</div>
            <div>Name</div>
            <div>Time</div>
            <div>Contents</div>
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
</div>

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
