<?php


class FCreditCard {


    public static function verify($field, $value) {

        $entityManager = FEntityManager::getInstance();
        $result = $entityManager->verifyAttributes('Card', ECreditCard::class, $field, $value);
        
        return $result;
    }
    

}