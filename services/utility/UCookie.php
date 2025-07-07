<?php

class UCookie {
    /**
     * check if a ID cookie is set
     * 
     */

    public static function isSet($id): bool {
        return isset($_COOKIE[$id]);
    }
}
