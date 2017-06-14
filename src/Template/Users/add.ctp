<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Author']
        ]) ?>
<<<<<<< HEAD
    </fieldset>
<?= $this->Form->button(__('投稿')); ?>
<?= $this->Form->end() ?>

<?= $this->Form->create() ?>
<?=$this->Form->button('戻る',array('onclick' => 'history.back(); return false;')) ?>
=======
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
>>>>>>> KiyofumiMori
<?= $this->Form->end() ?>
</div>
