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
            ->add('handlename',[
                'maxlen' => ['rule'=>['maxlength',20]]
            ])
            ->notEmpty('body')
            ->add('body',[
                'maxlen' => ['rule'=>['maxlength',400]]
            ])
            ->notEmpty('password');

        return $validator;
    }
}
 ?>
