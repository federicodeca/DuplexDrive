<?php

require_once(__DIR__ . '/../../config/bootstrap.php');

class FEntityManager {

    private static $instance;
    private static $entityManager;


    private function __construct() {
        self::$entityManager = getEntityManager();
    }

    //singleton
    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function getEntityManager(){
        return self::$entityManager;
    }

     /**
     * retrive one obj
     * @return obj || null
     */
    public static function retriveObj($class, $id){
        
        try{
            $obj = self::$entityManager->find($class, $id);
            return $obj;
        }catch(Exception $e){
            echo "ERROR: ". $e->getMessage();
            return null;
        }
    }

    //TRANSAZIONI E LOCKING
    
    /**
     * retrive one obj and lock the tuple with all the attributes
     * this method is used to prevent concurrent modifications on the same object
     */
    public static function retriveObjLock($class, $id){
       self::$entityManager->getConnection()->beginTransaction(); // begin transaction 
        
        try{
            $obj = self::$entityManager->find($class, $id, \Doctrine\DBAL\LockMode::PESSIMISTIC_WRITE);
            return $obj;

        }catch(Exception $e){
            echo "ERROR: ". $e->getMessage();
            return null;
        }


    /**
     * save an object trough a transaction during a locking table , unlock the table  and close the transaction
     */    
    }
    public static function uploadObjAndUnlock($obj){
        try{
            
            self::$entityManager->persist($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit(); // commit transaction, object is saved correctly
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection()->rollBack(); // annulla tutto
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * unlock the table
     * this method is used to unlock the table after a locking
     */
    public static function commit(){
        try{
            self::$entityManager->getConnection()->commit();
        }catch(Exception $e){
            self::$entityManager->getConnection()->rollback();
        }
    }



    /**
     * return an object finding it not on the id but on an attribute
     * findOneBy is a method of the repository, find one object by a specific field
     * $class is the full name of the entity class (ex. App\Entity\User)
     * @return object|null
     */
    public static function retriveObjOnField($class, $field, $value){
        try{
            $obj = self::$entityManager->getRepository($class)->findOneBy([$field => $value]);
            return $obj;
        }catch(Exception $e){
            echo "ERROR: ". $e->getMessage();
            return null;
        }
    }

    /**
     * $table contains the full name of the entity class (ex. App\Entity\User)
     * return a list of objects of a specific table where the field value is equal to the id
     * @return array
     */
    public static function objectList($table, $field, $id)
    {
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " = :creatorId";
            $query = self::$entityManager->createQuery($dql);
            $query->setParameter('creatorId', $id);
            $result = $query->getResult();
            return $result;
            }catch(Exception $e){
                echo "ERROR " . $e->getMessage();
                return [];
            }
        
    }

    /**
     * OBJECT WITH NULL FIELD
     * return all the object of a specifyc table where the field value is null
     * @return array
     */
    public static function objectListUsingNull($table, $field){
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." .$field. " IS NULL";
            $query = self::$entityManager->createQuery($dql);
            $result = $query->getResult();
            if(count($result) > 0){
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
                echo "ERROR " . $e->getMessage();
                return null;
        }
    }

    /**
     * FIND OBJECTS ON TWO ATTRIBUTES
     * return an object finding it not on the id but specifying 2 attributes
     */
    public static function getObjOnTwoAttributes($table, $field1, $value1, $field2, $value2)
    {
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." . $field1 . " = :value1 AND e." . $field2 . " = :value2";
            $query = self::$entityManager->createQuery($dql);
            $query->setParameter('value1', $value1);
            $query->setParameter('value2', $value2);
            $result = $query->getOneOrNullResult();
            return $result;

        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function caricaObj($obj) {
        $merged = self::$entityManager->persist($obj);
        self::$entityManager->flush();
    }

    /**
     * return a list of all the object that have the $str in the specified attribute
    */
    public static function getSearchedItem($table, $field, $str)
    {
        try{
            $dql = "SELECT e FROM " . $table . " e WHERE e." . $field . " LIKE :searchedStr";
            $query = self::$entityManager->createQuery($dql)->setParameter('searchedStr', '%' . $str . '%');
            $result = $query->getResult();
            if(count($result) > 0)
            {
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }

    /**
     * return the number of objects in a list finding they on a specific attribute
     */
    public static function countObjectListAttribute($table, $field, $value)
    {
        try{
            $dql = "SELECT COUNT(e) FROM " . $table . " e WHERE  e." .$field . " = :attribute";
            $query = self::$entityManager->createQuery($dql);
            $query->setParameter('attribute', $value);

            $result = $query->getSingleScalarResult();
            return $result;
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return [];
        }
    }
    /**
     * verify if exist an object
     */
    public static function verifyAttributes($fieldId, $table, $field, $id){
        try{
            $dql = "SELECT u.id".$fieldId. " FROM " . $table . " u WHERE u." . $field . " = :attribute";
            $query = self::$entityManager->createQuery($dql);
            $query->setParameter('attribute', $id);

            $result = $query->getResult();
            if(count($result) > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
                echo "ERROR " . $e->getMessage();
                return null;
            }
    }

    /**
     * INSERT/UPDATE(transaction)
     * save one object in the db (persistance of Entity)
     * This method uses a transaction to ensure that the object is saved correctly.
     * If an error occurs, the transaction is rolled back and an error message is displayed.
     * @return boolean
     */
    public static function saveObject($obj)
    {
        try{
            self::$entityManager->getConnection()->beginTransaction();  // begin transaction
            self::$entityManager->persist($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();     // commit transaction, object is saved correctly
            return true;
            } catch (\Exception $e) {
            self::$entityManager->getConnection()->rollBack(); // annulla tutto
            throw $e;
        }
    }

    /**
     * DELETE(transaction)
     * delete an object from the db 
     * This method uses a transaction to ensure that the object is deleted correctly.
     * @return boolean
     */
    public static function deleteObj($obj){
        try{
            self::$entityManager->getConnection()->beginTransaction();
            self::$entityManager->remove($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * return an array of all elements of a table
     * @return array
     */
    public static function selectAll($table){
        try{
            $dql = "SELECT e FROM " . $table . " e";
            $query = self::$entityManager->createQuery($dql);
            $result = $query->getResult();
            return $result;
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return [];
        }
    }


 
    /**
     * do query in native sql language
     */
    public static function executeQuery($sql, $params = []){
        try {
            $conn = self::$entityManager->getConnection();
            $stmt = $conn->prepare($sql);
            $result=$stmt->executeQuery($params);
            return $result->fetchAllAssociative();
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Execute a DQL query with optional parameters, limit, and offset.
     *
     * @param string $sql       The DQL string to execute
     * @param array  $params    Associative array of parameters for the query
     * @param int|null $limit   Maximum number of results (optional)
     * @param int|null $offset  Offset for result set (optional)
     * @return array            Array of resulting entities or data
     */
    public static function doQuery($dql, array $params = [], ?int $limit = null, ?int $offset = null): array {
        try {
            $entityManager = self::$entityManager;
            $query = $entityManager->createQuery($dql)
                ->setParameters($params);

            if ($limit !== null) {
                $query->setMaxResults($limit);
            }
            if ($offset !== null) {
                $query->setFirstResult($offset);
            }

            return $query->getResult();
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            return [];
        }
    }
       
    


    
  
    /**
     * Persist an object in the database.
     * This method is used to save an object in the database inside a transaction.
     * It is used to prevent concurrent modifications on the same table.
     */
    public static function persistAndFlush($obj) {
     
            self::$entityManager->persist($obj); // Persist the object
            self::$entityManager->flush(); // Flush changes to the database
   
    }

    /**
     * remove an object from the database and flush changes.
     */
    public static function removeAndFlush($obj) {

        self::$entityManager->remove($obj); // Remove the object
            self::$entityManager->flush(); // Flush changes to the database
  
    }

    /**
     * Begin a transaction.
     * This method is used to start a transaction before performing any database operations.
     */
    public static function beginTransaction() {
        self::$entityManager->getConnection()->beginTransaction(); // Begin transaction
    }

    /**
     * Execute a DQL query with a pessimistic write lock.
     * This method is used to lock the table for writing to prevent concurrent modifications.
     */
    public static function doQueryLock($dql, array $params = []) {
             try {
            $entityManager = self::$entityManager;
            $query = $entityManager->createQuery($dql)
                ->setParameters($params)
                ->setLockMode(\Doctrine\DBAL\LockMode::PESSIMISTIC_WRITE); // Lock the table for writing

            return $query->getResult();
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            return [];
        }

    }
}