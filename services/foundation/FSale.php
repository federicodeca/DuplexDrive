<?php

class FSale {

    public static function getSaleOrders($table) {
        $saleOrders = [];
        $saleOrders = FEntityManager::getInstance()->selectAll($table);
    
        return $saleOrders;
    }

    public static function retrieveSalesForPeriod($start, $end) {
        $dql="SELECT s FROM ESale s WHERE s.orderDate >= :start AND s.orderDate < :end";
        $params = [
            'start' => $start,
            'end' => $end
            
        ];
        $sales = FEntityManager::getInstance()->doQuery($dql, $params);
        
        return $sales;
    }

    public static function retrieveSaleByUser($user) {
        $dql = "SELECT s FROM ESale s WHERE s.user = :user";
        $params = [
            'user' => $user
        ];
        $sales = FEntityManager::getInstance()->doQuery($dql, $params);
        
        return $sales;
    }

}