<?php
    namespace App\Model\Entitiy;

    use Cake\Auth\DefaultPasswordHasher;
    use Cake\ORM\Entity;

    class User extends Entity
    {

        //Make all fields mass assignable except for primary key field "id".
        protected $_accessible = [
            '*' => true,
            'id' => false
        ];
    }

    Protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

 ?>
