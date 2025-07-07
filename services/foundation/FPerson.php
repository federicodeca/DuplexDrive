<?php

class FPerson {
    public static function verify($field, $id){
        $result = FEntityManager::getInstance()->verifyAttributes('User', EPerson::getEntity(), $field, $id);

        return $result;
    }

    public static function getPersonByUsername($username) {
        $user = FEntityManager::getInstance()->retriveObjOnField(EPerson::class, 'username', $username);
        return $user;
    }
}