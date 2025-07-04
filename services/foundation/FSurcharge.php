<?php

class FSurcharge {


    public static function getAllValidSurcharges(int $carId) {
        $dql = "SELECT s FROM ESurcharge s WHERE s.car = :carId AND s.start > CURRENT_DATE() ORDER BY s.start ASC";
        
        $params = [
            'carId' => $carId
        ];

        $result = FEntityManager::getInstance()->doQuery($dql, $params);
        return $result;
        
     

    }
}