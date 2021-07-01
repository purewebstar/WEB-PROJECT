<?php

class Customer{

    protected static $connector;

    public function __construct(){
        self::$connector = new Model();
    }

    public static function registerCustomers($cust_data){
        

            $email = $cust_data['email'];
            $password = sha1($cust_data['password']);
            $lastName = $cust_data['firstName'];
            $firstName = $cust_data['firstName'];
            $birth = $cust_data['Birth'];
            $phone = $cust_data['Phone'];
            $address = $cust_data['address'];
            $city = $cust_data['City'];
            $country = $cust_data['Country'];
            $cv = $cust_data['Cv'];

            $query = "
            INSERT INTO CUSTOMER(custEmail, custPassword, custLastName, custFirstName,
            custBirth,custAddress,custCity,custCountry,uploadCv) VALUES('$email','$password','$lastName'
            ,'$firstName','$birth','$phone','$address','$city','$country','$cv')
            ";

            $handler = self::$connector->getConnection();
            $statement = $handler->prepare($query);

            return $statement->execute();
    }

    public static function loginCustomers($cust_data){
        $email = $cust_data['email'];
        $password = sha1($cust_data['password']);
        $query = "
        SELECT * FROM CUSTOMER WHERE custEmail='$email' and custPassword='$password'
                 ";
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $data = ['status' =>false, 'email' => ''];

        if(count($result)>0){
            
             $data['status'] = true;
             foreach($result as $r):
                $data['email'] = $r['custEmail'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }
    }

    public static function uploadCv($file){

    }

    public static function readExpertRecommendations($recommendId){
        
    }
}
