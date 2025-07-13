<?php

class FPersistentManager {

    // the variable $instance is used to store the singleton instance of the class
    private static $instance;


    private function __construct() {
        // private constructor to prevent external instantiation
    }

        public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

  

    ////////TRANSAZIONI E LOCKING


    /**
     * this method is used to begin a transaction
     * it is used to prevent error like db downtime
     */
    public static function beginTransaction() {
       
        FEntityManager::getInstance()->beginTransaction();
    }


    /**
     * return object by id with locking the tuple 
     */
    public function getObjectByIdLock(string $className, int $id) {
        
        $res= FEntityManager::getInstance()->retriveObjLock($className, $id);
        return $res;
    }

    /**
     * upload object and unlock the table
     * this method is used to save an object in the database and unlock the table
     * it is used to prevent concurrent modifications on the same table
     */
    public static function uploadObjAndUnlock($obj) {
        FEntityManager::getInstance()->uploadObjAndUnlock($obj);
    }


    /**
     * persist an object in the database
     * this method is used to save an object in the database inside a transaction
     * it is used to prevent concurrent modifications on the same table
     */
    public static function persistInTransaction($obj) {
        FEntityManager::getInstance()->persistAndFlush($obj);
    }

    /**
     * remove an object in the database
     * this method is used to remove an object in the database inside a transaction
     * it is used to prevent concurrent modifications on the same table
     */
    public static function removeInTransaction($obj) {
        FEntityManager::getInstance()->removeAndFlush($obj);
    }

    /**

     * this method is used to unlock the table and close the transaction
     */
    public static function unlock(){
        FEntityManager::getInstance()->commit();
    }



      /**
     * UPLOAD OBJECT
     * upload any Object in the database with single TRANSACTION
     */
    public static function uploadObj($obj){

        $result = FEntityManager::getInstance()->saveObject($obj);

        return $result;
    }

     /**
      * DELETE OBJECT
     * delete an object by id in a TRANSACTION
     */
    public static function removeObject($obj):void {
        FEntityManager::getInstance()->deleteObj($obj);
    } 


    public static function lockAllIndispForCar(int $carId) {
        // This method locks all unavailability records for a specific car
        FUnavailability::lockAllIndispForCar($carId);
    }

    
    //////// OBJECTS RETRIEVAL 


      /**
     * return object by id
     */
    public function getObjectById(string $className, int $id) {
        
        $res= FEntityManager::getInstance()->retriveObj($className, $id);
        return $res;
    }


    /**
     * return object by field
     */
    public function getObjectByField(string $className, string $field, $value) {
        
        $res= FEntityManager::getInstance()->retriveObjOnField($className, $field, $value);
        return $res;
    }

  


 


    //LOGIN
    /**
     * return a User finding it not on the id but on it's username
     */

    public static function retrivePersonOnUsername($username)
    {
        $result = FPerson::getPersonByUsername($username);

        return $result;
    }
    
    public static function retriveUserOnUsername($username)
    {
        $result = FUser::retriveUserOnUsername($username);

        return $result;
    }




    /**
     * return all cars from a table
     * @param string $table
     * @return array
     */
    public static function retriveAllCars($table)
    {
        $result = FAuto::getAllCars($table);

        return $result;
    }

    /** 
     * return all cars for rent from the table
     */
    public static function retriveAllRentCars() {
        $result = FCarForRent::getAllCarsForRent(ECarForRent::class);
        return $result;
    }

 
    /**
     * return all cars for sale from the table
     */
    public static function retriveAllAvailableSaleCars() {
        $result = FCarForSale::getAllAvailableCarsForSale(ECarForSale::class);
        return $result;
    }
    


    
    



    //LOGIN AND REGISTRATION
    

    /**  
    * verify if the username is already used by another person
    */
    public static function verifyPersonUsername($username){
        $result = FPerson::verify('username', $username);

        return $result;
    }

    /**
     * verify if the username is already used by another user
     */
    public static function verifyUserUsername($username){
        $result = FUser::verify('username', $username);

        return $result;
    }

    /**
     * verify if the email is already used by another person (user,admin)
     */
    public static function verifyPersonEmail($email) {
        $result = FPerson::verify('email', $email);

        return $result;
    }


    //NOLEGGIO AUTO

    /**
     * verify if the card is already inserted in the database
     */
    public static function verifyCardNumber($cardNumber){
        $result = FCreditCard::verify('cardNumber', $cardNumber);

        return $result;
    }

    /**
     * return all credit cards of a user
     */
    public static function getAllCreditCardsByUser($idUser) {
        $user = FEntityManager::getInstance()->retriveObj(EUser::class, $idUser);
        $result = FEntityManager::getInstance()->objectList(ECreditCard::class, 'user', $user);
        return $result;

    }

    /**
     * return an object by field
     */
    public static function retrieveObjectByField($className, $field, $value) {
        $result = FEntityManager::getInstance()->retriveObjOnField($className, $field, $value);
        return $result;
    }

   


    //ACQUISTO AUTO    

    /**
     * This method retrieves all cars for sale that are available by filtering based on the provided brand, model and price.
     * all parameters are optional, if not provided, all cars will be returned.
     * It returns an array of car objects that are available for sale.
     */
    public static function searchCarsForSale($brand = null, $model = null, $offset = 0, $limit = 6) {  
        $result = FCarForSale::searchCarsForSale($brand, $model, $offset, $limit);
        return $result;
    } 


    /**
     * This method counts the total number of cars for sale that match the search criteria.
     * It returns the total count of cars that match the brand and model.
     */
    public static function countSearchedCars($brand = null, $model = null) {
        $result = FCarForSale::countSearchedCars($brand, $model);
        return $result;
    }


    /**
     * This method retrieves all distinct brands of cars for sale that are available.
     * It returns an array of unique brands.
     */
    public static function getAllBrands() {
        $result = FCarForSale::getAllBrands();
        return $result;
    }


    /**
     * This method retrieves all distinct models of cars for sale that are available for a specific brand.
     */
    public static function getAllModels($brand) {
        $result = FCarForSale::getAllModels($brand);
        return $result;
    }
    
    /**
     * It returns an array of offers that are currently available for sale to be displayed on the home page.
     */
    public static function getOffers() {
        $result = FCarForSale::getOffersSale();
        return $result;
    }

    /**
     *retrieve all licenses that are not checked yet
      */    
    public static function getNotCheckedLicense($licenseTable) {
        $result = FLicense::getNotCheckedLicense($licenseTable);
        return $result;
    }

    public static function retriveLicense($id) {
        $result = FLicense::getLicenseById($id);
        return $result;
    }



    /**
     * this method retrieves all unavailabilities that are actually (start > current time) valid for a specific car
     */
    public static function getAllValidUnavailabilities(int $carId) {
       $result=FUnavailability::getAllValidUnavailabilities($carId);
       return $result;
    }


    /**
     * retrieve all surcharges for a car
     */
    public static function getAllValidSurcharges(int $carId) {
       $result=FSurcharge::getAllValidSurcharges($carId);
       return $result;
    }
    
    /**
     * retrieve all sales 
     */
    public static function getSaleOrders($saleTable) {
        $result = FSale::getSaleOrders($saleTable);
        return $result;
    }


    /**
     * retrieve all rents
     */
    public static function getRentOrders($rentTable) {
        $result = FRent::getRentOrders($rentTable);
        return $result;
    }

    /**
     * retrieve all rents for a specific period from start to end date
     */
    public static function getRentsForPeriod($start, $end) {
        $result = FRent::retrieveRentsForPeriod($start, $end);
        return $result;
    }

    /**
     * retrieve all sales for a specific period from start to end date
     */
    public static function getSalesForPeriod($start, $end) {
        $result = FSale::retrieveSalesForPeriod($start, $end);
        return $result;
    }

    /**
     * verify if the user has already written a review 
     */
    public static function verifyReview($user) {
        $result = FReview::verify($user);

        return $result;
    }

    /**
     * retrieve the best reviews
     * this method retrieves the best reviews from the database, ordered by rating in descending order
     */
    
    public static function getBestReviews() {
        $result = FReview::retrieveBestReviews();
        return $result;
    }


    /**
     * retrieve all reviews
     */
    public static function retrieveAllReviews() {
        $result = FReview::getAllReviews();
        return $result;
    }

    /**
     * count the number of reviews
     */
    public function countReviews() {
    $result=FReview::countAllReviews();
    return $result;
    }

    public static function verifyUserEmail($email) {
        $result = FPerson::verify('email', $email);
        return $result;
    }

    public static function getOrdersByUser($user){
        $result = FSale::retrieveSaleByUser($user);
        return $result;
    }

    public static function getRentsByUser($user){
        $result = FRent::retrieveRentByUser($user);
        return $result;
    }
}
