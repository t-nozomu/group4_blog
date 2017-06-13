<!-- File: src/Template/Users/login.ctp-->

<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and Password') ?></legend>
            <?= $this->Form->control('username') ?>
            <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->buttom(__'('Login')); ?>
<?= $this->Form->end() ?>
</div>
