<?php


/**
 * Class to access to SUPERGLOBAL arrays for the HTTP request like $_POST, $_FILES, You must use this class to access theese arrays (in this class are implemented only $_POST and $_FILES) 
 */
class UHTTPMethods{

    /**
     * can access to $_POST superglobal
     */
    public static function post($param){
        return $_POST[$param];
    }
    /**
     * can access to $_POST superglobal, if the param is not set return null
     */
    public static function postOrNull($param){
        if (isset($_POST[$param])) return $_POST[$param];
        else return null;
    }
    /**
     * can access to $_FILES superglobal
     */
    public static function files(...$param){
        if (count($param)  == 1) return $_FILES[$param[0]];
        else if (count($param) == 2) return $_FILES[$param[0]][$param[1]];
        else if (count($param) == 3) return $_FILES[$param[0]][$param[1]][$param[2]];
        else if (count($param) == 4) return $_FILES[$param[0]][$param[1]][$param[2]][$param[3]];
        else if (count($param) == 5) return $_FILES[$param[0]][$param[1]][$param[2]][$param[3]][$param[4]];
        else return $_FILES[$param[0]][$param[1]][$param[2]][$param[3]][$param[4]][$param[5]];
    }

    public static function multipleFiles($param) {

        // Se sono più immagini
        $files = [];
        $count = count($_FILES[$param]['name']);
        for ($i = 0; $i < $count; $i++) {
            if ($_FILES[$param]['error'][$i] === UPLOAD_ERR_NO_FILE) continue;
            $files[] = [
                'name' => $_FILES[$param]['name'][$i],
                'type' => $_FILES[$param]['type'][$i],
                'tmp_name' => $_FILES[$param]['tmp_name'][$i],
                'error' => $_FILES[$param]['error'][$i],
                'size' => $_FILES[$param]['size'][$i],
            ];
        }
        return $files;
    }

    public static function getBinaryFile($File){
        $fileData = file_get_contents($$File['$name']['tmp_name']);
        return $fileData; 
    }  
} 