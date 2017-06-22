<?php
// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

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
                'maxlen' => [
                    'rule'=>['maxlength',20]
                ]
            ])
            ->notEmpty('body')
            ->add('body',[
                'maxlen' => ['rule'=>['maxlength',400]]
            ])
            ->notEmpty('password');

        return $validator;
    }
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = preg_replace('/^[ 　\r\n]+/u', '', $value);
                $data[$key] = trim(preg_replace("/(\r\n){3,}|\r{3,}|\n{3,}/","\n\n",$data[$key]));
            }
        }
    }
}
 ?>
