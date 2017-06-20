<?= $this->Html->css('login_style.css') ?>
<?= $this->Flash->render() ?>
<div class="login_box">
    <center>
        <?= $this->Form->create() ?>

        <div ><?= 'Please enter your username and password.'?></div>
        <div class="login_username"><?= $this->Form->control('username') ?></div>
        <div class="login_password"><?= $this->Form->control('password') ?></div>



<div class="buttons">
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Form->create(null,['url'=>['controller'=>'articles','action' => 'index']]) ?>
    <?= $this->Form->button('Back',['class'=>'HelperButton']) ?>
    <?= $this->Form->end() ?>
</div>
    </center>
</div>
