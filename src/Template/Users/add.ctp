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
<<<<<<< HEAD
<?= $this->Form->end() ?>

<?= $this->Form->create() ?>
=======
>>>>>>> 3ea4dd4271cef4ef52a596246098d42d8472057f
<?=$this->Form->button('戻る',array('onclick' => 'history.back(); return false;')) ?>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
