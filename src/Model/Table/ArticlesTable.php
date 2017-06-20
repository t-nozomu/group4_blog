<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->hasMany('Comments', [
        'className' => 'Comments'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->add('title',[
                'maxlen' => ['rule'=>['maxlength',20]]
            ])
            ->notEmpty('body');

        return $validator;
    }

    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }
}
?>
