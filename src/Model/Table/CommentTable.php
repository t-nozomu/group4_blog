<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

    }

    public function validationDefault(Validator $validator)
    {
        $validator
        ->notEmpty('handlename')
        ->requirePresence('handlename')
        ->notEmpty('body')
        ->requirePresence('body')
        ->notEmpty('password')
        ->requirePresence('password');

        return $validator;
    }
}
 ?>
