<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string', [
<<<<<<< HEAD

=======
            'default' => null,
>>>>>>> origin/KiyofumiMori
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
<<<<<<< HEAD
            'limit' => 255,
            'null' => false,
=======
        'default' => null,
        'limit' => 255,
        'null' => false,
>>>>>>> origin/KiyofumiMori
        ]);
        $table->addColumn('role', 'string', [
            'default' => null,
            'limit' => 20,
<<<<<<< HEAD
=======
        /*
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
>>>>>>> origin/KiyofumiMori
            'null' => false,
        ]);
        $table->create();
    }
}
