<?= $this->Html->css('login_style.css') ?>
<div class="login_box">
    <center>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>

        <div ><?= 'Please enter your username and password'?></div>
        <div class="login_username"><?= $this->Form->control('username') ?></div>
        <div class="login_password"><?= $this->Form->control('password') ?></div>

<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
<?= $this->Form->create(null,['url'=>['controller'=>'articles','action' => 'index']]) ?>
<?= $this->Form->button('Back',['class'=>'HelperButton']) ?>
<?= $this->Form->end() ?>
    </center>
</div>
