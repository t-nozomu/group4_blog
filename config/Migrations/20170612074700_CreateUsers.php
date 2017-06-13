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
            'default' => "cpdex",
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => "dtmag",
            'limit' => 16,
            'null' => false,
        ]);
        $table->create();
    }
}
