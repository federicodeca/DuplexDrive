<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class CFrontController{
    
    public function run($requestUri){
        // Parse the request URI
        // echo $requestUri;

        $requestUri = trim($requestUri, '/');
        $uriParts = explode('/', $requestUri);

        array_shift($uriParts);
    
      

        // Extract controller and method names
        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User';
        // var_dump($controllerName);
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'home';

        // Load the controller class
        $controllerClass = 'C' . $controllerName;
        // var_dump($controllerClass);
        $controllerFile = __DIR__ . "/{$controllerClass}.php";
        // var_dump($controllerFile);

        //var_dump($controllerClass, $controllerFile, $methodName, $uriParts); exit;
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Check if the method exists in the controller
            if (method_exists($controllerClass, $methodName)) {
                // Call the method
                $params = array_slice($uriParts, 2); // Get optional parameters
                call_user_func_array([$controllerClass, $methodName], $params);
            } else {
                // Method not found, handle appropriately (e.g., show 404 page)
                header('Location: /DuplexDrive/User/home');
            }
        } else {
            // Controller not found, handle appropriately (e.g., show 404 page)
            header('Location: /DuplexDrive/User/home');
        }
    }
}