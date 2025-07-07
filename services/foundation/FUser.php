<?php




class FUser {

    public static function retriveUserOnUsername($username) {
        
       $result = FEntityManager::getInstance()->retriveObjOnField(EUser::class, 'username', $username); 
        return $result;
    }

        public static function verify($field, $id){
        $result = FEntityManager::getInstance()->verifyAttributes('User', EUser::getEntity(), $field, $id);

        return $result;
    }



    
}
