<?php

class FReview
{
public static function getReviewByUserId($user) {
        $entityManager = FEntityManager::getInstance();
        $review = $entityManager->retriveObjOnField(EReview::class, 'user_id', $user);
        
        if ($review) {
            return $review;
        } else {
            return null;
        }    
    }

    public static function verify($user) {
        $entityManager = FEntityManager::getInstance();
        $review = $entityManager->retriveObjOnField(EReview::class, 'user', $user);
        
        if ($review) {
            return true;
        } else {
            return false;
        }    
    }

    public static function retrieveBestReviews() {
        $dql = "SELECT r FROM EReview r ORDER BY r.rating DESC, r.id DESC";
        $result = FEntityManager::getInstance()->doQuery($dql, [], 3, 0);      
        return $result ?: [];
    }

    public static function getAllReviews() {
        $result= FEntityManager::getInstance()->selectAll(EReview::class);

        return $result;

    }


    public static function countAllReviews(){
    $sql="SELECT COUNT(*) as count FROM reviews";
    $result=FEntityManager::getInstance()->executeQuery($sql);
        return $result[0]['count'] ;
    }


 
}