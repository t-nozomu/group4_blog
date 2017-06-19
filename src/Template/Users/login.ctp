<div class="login_box">
    <center>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>

        <div ><?= __('Please enter your username and password') ?></div>
        <div class="login_username"><?= $this->Form->control('username') ?></div>
        <div class="login_password"><?= $this->Form->control('password') ?></div>

<?= $this->Form->button(__('Login')); ?>
<?=$this->Form->button('Back',array('onclick' => 'history.back(); return false;')) ?>
<?= $this->Form->end() ?>
    </center>
</div>
