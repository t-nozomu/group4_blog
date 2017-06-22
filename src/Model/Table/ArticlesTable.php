<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

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
                'maxlen' => [
                    'rule'=>['maxlength',20]
                ]
            ])
            ->notEmpty('body');

        return $validator;
    }

    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = preg_replace('/^[ 　\r\n]+/u', '', $value);
                $data[$key] = trim(preg_replace("/(\r\n){3,}|\r{3,}|\n{3,}/","\n\n",$value));
            }
        }
    }
}
?>
