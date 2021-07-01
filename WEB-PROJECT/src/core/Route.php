<?php

 class Route{

    private static $custController;
    private static $custMethod = 'cust_index';
    private static $custParam = [];

    private static $expertController;
    private static $expertMethod = 'expert_index';
    private static $expertParam = [];

    private static $adminController;
    private static $adminMethod = 'admin_index';
    private static $adminParam = [];

    public function __construct(){

        $url = self::parseUrl();

        switch($url[0]){

            // for customer users
            case 'customer':

                require_once '../src/controller/'.self::$custController.'.php';
                

                if(isset($url[0]) && method_exists(self::$custController, self::$custMethod)){
                    self::$custController = new self::$custController;
                    self::$custMethod = 'cust_index';
                    unset($url[0]);
                }

                self::$custParam = $url ? array_values($url) : [];
                call_user_func_array([self::$custController, self::$custMethod],self::$custParam);

            break;
            // for expert users
            
            case 'expert':
require_once '../src/controller/'.self::$expertController.'.php';
                

            if(isset($url[0]) && method_exists(self::$expertController, self::$expertMethod)){
                self::$expertController = new self::$expertController;
                self::$expertMethod = 'expert_index';
                unset($url[0]);
            }

            self::$expertParam = $url ? array_values($url) : [];
            call_user_func_array([self::$expertController, self::$expertMethod],self::$expertParam);

            break;
            // for admin users
            case 'admin':
                require_once '../src/controller/'.self::$adminController.'.php';
                

                if(isset($url[0]) && method_exists(self::$adminController, self::$adminMethod)){
                    self::$adminController = new self::$adminController;
                    self::$adminMethod = 'cust_index';
                    unset($url[0]);
                }

                self::$adminParam = $url ? array_values($url) : [];
                call_user_func_array([self::$adminController, self::$adminMethod],self::$adminParam);
             break;
        }
    }

    public static function parseUrl(){
        if(isset($_GET['url'])){
          return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    }
 }
