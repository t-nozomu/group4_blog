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
            'default' => "",
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => "",
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColum('role', 'string', [
            'default' => "",
            'limit' => 20,
            'null' => 'false,'
        ]);
        /*
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        */
        $table->create();
    }
}
