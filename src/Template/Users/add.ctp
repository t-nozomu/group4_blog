<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Author']
        ]) ?>
    </fieldset>

<?= $this->Form->end() ?>

<?= $this->Form->create() ?>

>>>>>>> 3a35bc1bf14a724cc7fac7c93adf82e1edec6523
<?=$this->Form->button('戻る',array('onclick' => 'history.back(); return false;')) ?>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
