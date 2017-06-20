
<?= $this->Html->css('view_style.css') ?>
    <div class="view_title1"><?= $this->Form->postLink(
        '記事一覧へ',
        ['action' => 'index'])?>
    </div>
<div class="view_box">
    <div class="view_box1">
    <div class="view_title">TITLE : <?= h($article->title) ?></div>
        <div class="view_time">TIME : <?= $article->created->format('Y年m月d日 H:i:s') ?></div>
        <div class="view_delete1"><?= $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $article->id],
            ['confirm' => 'Are you sure?'])?>

        <div class="view_edit"><?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?></div>
        </div>
    </div>

        <div> <?php echo nl2br(h($article->body)) ?></div>


</div>
<!--heyheyhey-->
<br>
<div class="view_box2">

    <?= $this->Form->create(null,['url'=>['controller'=>'comments','action'=>'add']]) ?>
    <?= $this->Form->input('handlename',['label'=>'Name','maxlength'=>20]) ?>
    <div class="view_body1"><?= $this->Form->input('body', ['rows' => '7', 'cols' => '96','label'=>'Content','maxlength'=>400]) ?></div>
    <div>
        <div><?=  $this->Form->input('password',array('placeholder' => "任意のPassを入力してください")) ?> </div>
        <div><?= "※このパスワードはコメント修正、削除時に必要になります。<br />" ?> </div>
    </div>

    <?= $this->Form->button(__('Add')) ?>
    <?= $this->Form->hidden('article_id',array('value'=>$article->id)) ?>
    <?= $this->Form->end() ?>

</div>

<br>
<div class="">

    <div>
        <?php foreach ($article->comments as $comment): ?>
        <div class="view_box5">
            <div class="view_comment view_box4">

                <div class="view_id">ID:<?= h($comment->id) ?></div>
                <div class="view_hn">HN:<?= h($comment->handlename) ?></div>
                <div class="view_time">TIME:<?= $comment->created->format('Y年m月d日 H:i:s') ?></div>

                <div class="view_delete">
                    <a href="javascript:Dellog()">Delete</a>
                    <a href="javascript:Editlog()">Edit</a>
                </div>
            </div>
            <div class = "view_contents"><div><?= nl2br(h($comment->body)) ?></div></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script type="text/javascript">
    function Dellog(){
            var pswd = window.prompt("パスワードを入力してください","");
            if(pswd != null){
            var form = document.createElement('form');
            document.body.appendChild( form );
            form.setAttribute('action' , '/group4_blog/comments/delete/<?= $comment->id ?>');
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
            input.setAttribute('name','password');
            input.setAttribute('value',pswd);
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
