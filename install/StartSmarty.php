<?php

require_once __DIR__ . '/../vendor/autoload.php';  // adatta il path se serve
require_once __DIR__ . '/../vendor/smarty/smarty/libs/Smarty.class.php';

class_alias('Smarty\Smarty', 'Smarty');


class StartSmarty {

    


    /**
     * Inizializza e configura Smarty
     * @return \Smarty
     */
     static function configuration(){
        /** @var \Smarty $smarty */
        $smarty = new Smarty\Smarty();

        // Configura le directory
        $smarty->setTemplateDir(__DIR__ . '/../directory/Smarty/templates/');
        $smarty->setCompileDir(__DIR__ . '/../directory/Smarty/templates_c/');
        $smarty->setCacheDir(__DIR__ . '/../directory/Smarty/cache/');
        $smarty->setConfigDir(__DIR__ . '/../directory/Smarty/configs/');

        return $smarty;
    }
}




