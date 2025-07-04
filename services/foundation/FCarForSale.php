<?php

class FCarForSale {


    
    /**
     * This method retrieves all available cars for sale from the specified table.
     * It returns an array of car objects that are available for sale.
     */
   public static function getAllAvailableCarsForSale($table) {
        $cars = FEntityManager::getInstance()->selectAll($table);
        if (!$cars) {
            return [];
        }
        $availableCars = [];
        foreach ($cars as $car) {
            if ($car->isAvailable()) {
                $availableCars[] = $car;
            }
        }
        return $availableCars;
    }


    /** 
     * This method searches for cars for sale based on brand and model. 
     * It returns a paginated list of cars, with an offset and limit for pagination. dql is used to build the query dynamically based on the provided parameters.
     * 
     */
    public static function searchCarsForSale($brand = null, $model = null, $price=null, $offset = 0, $limit = 6) {
        $dql = "SELECT c FROM ECarForSale c WHERE c.available = 1";
        $params = [];
        $price = (int)$price;

        if (!empty($brand)) {
            $dql .= " AND c.brand = :brand";
            $params['brand'] = $brand;
        }

        if (!empty($model)) {
            $dql .= " AND c.model = :model";
            $params['model'] = $model;
        }
        if (!empty($price)) {
            $dql .= " AND c.price <= :price";
            $params['price'] = $price;
        }

        $offset = (int)$offset;
        $limit = (int)$limit;

        return FEntityManager::getInstance()->doQuery($dql, $params, $limit, $offset);
    }

    /**
     * This method counts the total number of cars for sale based on the provided brand and model.
     * It returns the total count of cars that match the search criteria.Sql query is built dynamically based on the provided parameters.
     */
    public static function countSearchedCars($brand = null, $model = null, $price = null) {
       
        
        $dql = "SELECT c FROM ECarForSale c WHERE c.available = 1";
        $params = [];
        $price = (int)$price;

        if (!empty($brand)) {
            $dql .= " AND c.brand = :brand";
            $params['brand'] = $brand;
        }

        if (!empty($model)) {
            $dql .= " AND c.model = :model";
            $params['model'] = $model;
        }
        if (!empty($price)) {
            $dql .= " AND c.price <= :price";
            $params['price'] = $price;
        }
        $result=FEntityManager::getInstance()->doQuery($dql, $params);
        
        return count($result) ;
    }

    /**
     * This method retrieves all distinct models of cars for sale that are available for a specific brand.
     * It returns an array of unique models.
     */

    public static function getAllModels($brand) {
        $sql = "SELECT DISTINCT model FROM auto as a JOIN cars_for_sale as c on a.idAuto=c.idAuto WHERE c.available = 1 and a.type= 'car_for_sale' and a.brand = '$brand'";
        
        $result = FEntityManager::getInstance()->executeQuery($sql);
        if (!$result) {
            return [];
        }
        return array_column($result, 'model');
    }

    /**
     * This method retrieves all distinct brands of cars for sale that are available.
     * It returns an array of unique brands.
     */

    public static function getAllBrands() {
        $sql = "SELECT DISTINCT brand FROM auto as a JOIN cars_for_sale as c on a.idAuto=c.idAuto WHERE c.available = 1 and a.type= 'car_for_sale'";
        $result = FEntityManager::getInstance()->executeQuery($sql);
        if (!$result) {
            return [];
        }
        return array_column($result, 'brand');
    }

    /** * This method retrieves all offers for sale, ordered by price in ascending order.
     * It returns a list of  3 cars that are available for home.
     */
 
    public static function getOffersSale() {
    $dql = "SELECT c FROM ECarForSale c WHERE c.available = 1 order by c.price ASC";
    

    return FEntityManager::getInstance()->doQuery($dql, [], 3, 0);
    }


}