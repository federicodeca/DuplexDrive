<?php

class FRent {

    public static function getRentOrders($table) {
        $rentOrders = [];
        $rentOrders = FEntityManager::getInstance()->selectAll($table);
    
        return $rentOrders;
    }

    public static function retrieveRentsForPeriod($start, $end) {
        $dql="SELECT r FROM ERent r JOIN r.unavailability u WHERE u.start >= :start AND u.start <= :end";
        $params = [
            'start' => $start,
            'end' => $end
            
        ];
        $rents = FEntityManager::getInstance()->doQuery($dql, $params);
        
        return $rents;
    }

    public static function retrieveRentByUser($user) {
        $dql = "SELECT r FROM ERent r WHERE r.user = :user";
        $params = ['user' => $user];
        $rents = FEntityManager::getInstance()->doQuery($dql, $params);
        
        return $rents;
    }

}