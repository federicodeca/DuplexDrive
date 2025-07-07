<?php

class FRent {

    public static function getRentOrders($table) {
        $rentOrders = [];
        $rentOrders = FEntityManager::getInstance()->selectAll($table);
    
        return $rentOrders;
    }

    public static function retrieveRentsForPeriod($start, $end) {
        $dql="SELECT r FROM ERent r WHERE r.orderDate >= :start AND r.orderDate < :end";
        $params = [
            'start' => $start,
            'end' => $end
            
        ];
        $rents = FEntityManager::getInstance()->doQuery($dql, $params);
        
        return $rents;
    }

}