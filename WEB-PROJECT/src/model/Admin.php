<?php

class Admin{

    private static $connector;

    public function __construct(){
        $connector = new Model();
    }

    public static function loginAdmin($admin_email, $admin_password){

        $conn = self::$connector->getConnection();

    }

    public static function activateExperts($expertId){

    }

    public static function deactivateExperts($expertId){

    }

    public static function createExpert($expert){
        
    }

    public static function readExpert($expertId){
        
    }

    public static function updateExpert($expertId){
        
    }

    public static function deleteExpert($expertId){
        
    }
}