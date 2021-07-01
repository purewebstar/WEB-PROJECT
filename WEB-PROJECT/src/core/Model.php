<?php
 class Model{


    private static $host = HOST;
    private static $db_name = DB_NAME;
    private static $username = USERNAME;
    private static $password = PASSWORD;

    private static $handler;

    public static function getConnection(){

        self::$handler = null;

        $host_db_name = "mysql:host=".self::$host.";dbname=".self::$db_name;
        try{
            
            self::$handler = new PDO($host_db_name, $username, $password);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return self::$handler;
    }
 }