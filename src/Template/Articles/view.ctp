<!-- 記事部分 -->
<?= $this->Html->css('view_style.css') ?>
<body class="haikei">
    <div class="view_title1"><?= $this->Form->postLink(
        '記事一覧へ',
        ['action' => 'index'],['class' => 'link_color'])?>
    </div>
<div class="view_box">
    <div class="view_box1">
    <div class="view_title">TITLE : <?= h($article->title) ?></div>
        <div class="view_time"><?= $article->modified->format('Y年m月d日 H:i:s') ?></div>
        <?php if( !is_null($auth) ): ?>
        <div class="view_delete1"><?=  $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $article->id],
            ['confirm' => 'Are you sure?'])?>

        <div class="view_edit"><?= $this->Html->link('Edit', ['action' => 'edit', $article->id],['class' => 'link_color']); ?></div>
        </div>
        <?php endif; ?>
    </div>

        <div class="view_body7"> <?php echo nl2br(h($article->body)) ?></div>


</div>
<!-- コメント入力フォーム -->
<br>
<div class="view_box2">

    <?= $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]) ?>
    <?= $this->Form->input('handlename',['label'=>'Name','maxlength'=>20]) ?>
    <div class="view_body1"><?= $this->Form->input('body', ['rows' => '7', 'cols' => '96','label'=>'Contents','maxlength'=>400]) ?></div>
    <div>
        <div><?=  $this->Form->input('password',array('placeholder' => "任意のPassを入力してください")) ?> </div>
        <div class="view_keikoku"><?= "※このパスワードはコメント修正、削除時に必要になります。<br />" ?> </div>
    </div>

    <div class="add_button"><?= $this->Form->button(__('Add'),['onclick'=>'return double(this)']) ?></div>
    <?= $this->Form->hidden('article_id',array('value'=>$article->id)) ?>
    <?= $this->Form->end() ?>

</div>
<!-- コメント一覧 -->
<br>
<div class="">

    <div>
        <?php foreach ($article->comments as $comment): ?>
        <div class="view_box5">
            <div class="view_comment view_box4">

                <div class="view_hn">HN:<?= h($comment->handlename) ?></div>
                <div class="view_time"><?= $comment->modified->format('Y年m月d日 H:i:s') ?></div>

                <div class="view_delete">
                    <a href="javascript:Dellog(<?= $comment->id?>)" class="link_color">Delete</a>
                    <a href="javascript:Editlog(<?= $comment->id?>)" class="link_color">Edit</a>
                </div>
            </div>
            <div class = "view_contents"><div><?= nl2br(h($comment->body)) ?></div></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

<script type="text/javascript">
    function Dellog(id){
            var pswd = window.prompt("Plase enter your password","");
            if(pswd != null){
            var form = document.createElement('form');
            document.body.appendChild( form );
            form.setAttribute('action' , '/group4_blog/comments/delete/'+id);
            form.setAttribute('method','post');
            var input = document.createElement('input');
            input.setAttribute('type','hidden');
            input.setAttribute('name','password');
            input.setAttribute('value',pswd);
            form.appendChild(input);
            // console.log(input);
            form.submit();

        }
        else{
            window.alert("Cancel password input.");
        }

    }

    function Editlog(id){
            //window.alert("aaaaaaaa");
            if(pswd = window.prompt("Plase enter your password.","")){
            var form = document.createElement('form');
            document.body.appendChild( form );
            var input = document.createElement('input');
            input.setAttribute('type','hidden');
            input.setAttribute('name','password');
            input.setAttribute('value',pswd);
            form.appendChild(input);
            form.setAttribute('action' , '/group4_blog/comments/edit/'+id);
            form.setAttribute('method','post');
            form.submit();
        }
        else{
            window.alert("Cancel password input.");
        }

    }
        function double(a){
            a.disabled = true;
            a.form.submit();
        }
</script>
