<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config.php';

$entityManager = null;

function getEntityManager(): EntityManagerInterface {
    global $entityManager;

    if ($entityManager === null) {
        $paths = [__DIR__ . '/../entity'];
        $isDevMode = true;

        // Configurazione Doctrine ORM 3.x con PHP attributes o annotations
        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $config->setProxyDir(__DIR__ . '/../cache/proxies');  // esempio
        $config->setAutoGenerateProxyClasses(true); // o
        
       
        // Configurazione della connessione
        $connectionParams = [
            'dbname' => DB_NAME,
            'user' => DB_USER,
            'password' => DB_PASSWORD,
            'host' => DB_HOST,
            'driver' => 'pdo_mysql',
        ];


        // Crea la connessione DBAL
        $connection = DriverManager::getConnection($connectionParams, $config);

        // Crea l'EntityManager
        $entityManager = new EntityManager($connection, $config);

  
        
    }

    return $entityManager;
}