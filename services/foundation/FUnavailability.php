<?php

class FUnavailability {

    public static function getAllValidUnavailabilities(int $carId) {
        $dql = "SELECT u FROM EUnavailability u WHERE u.car = :carId AND u.start > CURRENT_DATE() ORDER BY u.start ASC";
        
        $params = [
            'carId' => $carId
        ];

        $result = FEntityManager::getInstance()->doQuery($dql, $params);
        return $result;
        
     

    }
}