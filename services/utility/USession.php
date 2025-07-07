<?php

class USession {

    private static $instance;

    private function __construct() {

     session_set_cookie_params([
    'lifetime' => COOKIE_EXP,
    'path' => '/',
    'domain' => '',         // vuoto in locale
    'secure' => false,      // true in produzione con HTTPS
    'httponly' => true,
    'samesite' => 'Lax'     //  evita che il browser blocchi il cookie quando uso il islogged
]);
session_start();
    }

    /**
     * get the instance of the session
     */

    public static function getInstance(): USession {
        if (self::$instance === null) {
            self::$instance = new USession();
        }
        return self::$instance;
    }
    /**
     * get the session status
     */
    public static function getSessionStatus(): int {
        return session_status();
    }

    /**
     * get an element from the session
     */
    public static function getElementFromSession(string $key): mixed {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    /**
     * set an element in the session
     */
    public static function setElementInSession(string $key, mixed $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * kill the session
     */
    public static function killSession(): void {
        session_destroy(); // destroy all data in the session
    }

    /**
     * unset an elemnet from $_SESSION
     */
    public static function unsetElementFromSession($id): void {
        if (isset($_SESSION[$id])) {
            unset($_SESSION[$id]);
        }
    }

    /**
     * unset all elements from $_SESSION
     */
    public static function unsetAllElementsInSession(): void {
        session_unset(); // empty the $_SESSION array
    }
    
    /**
     * check if an element is set in the session
     */
    public static function isSetSessionElement(string $key): bool {
        return isset($_SESSION[$key]);
    }
        
}
    

