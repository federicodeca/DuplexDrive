
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/config/autoloader.php";
require_once __DIR__ . "/install/StartSmarty.php";
require_once __DIR__ . "/install/Installation.php";



Installation::install();

$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);

