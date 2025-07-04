<?php



class FAuto {


    public static function getAllCars($table) {
        $cars = FEntityManager::getInstance()->selectAll($table);
        return $cars;
    }
    
    
}