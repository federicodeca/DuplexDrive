<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../config/bootstrap.php');
use Doctrine\ORM\Tools\SchemaTool;
/**
 * for checking if the db exist and if not create it
 */
class Installation{

    public static function install(){
        try{

            $db = new PDO("mysql:host=". DB_HOST, DB_USER, DB_PASSWORD);

            $stmt = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . DB_NAME ."'");
            $existingDatabase = $stmt->fetchColumn();

            if(!$existingDatabase){
                $queryCreateDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
                $db->exec($queryCreateDB);
            
            
            
                $entityManager = getEntityManager();
                $schemaTool = new SchemaTool($entityManager);
                $metadata = $entityManager->getMetadataFactory()->getAllMetadata();

                $schemaTool->createSchema($metadata);
                require_once(__DIR__ . '/../filldb.php'); //da togliere su altervista

            }

    
        }catch(Exception $e){
            echo "ERROR: ". $e->getMessage();
        }
    }


}
