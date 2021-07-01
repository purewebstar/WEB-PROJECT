<?php

class Customer{

    private static $connector;

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

            $query = "
            INSERT INTO CUSTOMER(custEmail, custPassword, custLastName, custFirstName,
            custBirth,custAddress,custCity,custCountry) VALUES('$email','$password','$lastName'
            ,'$firstName','$birth','$phone','$address','$city','$country')
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

    public static function uploadCv($fileName, $custId){

        $query = "INSERT INTO CUST_CV(cvName, custId) VALUES('$fileName','$custId')";
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);

        return $statement->execute();

    }

    public static function readExpertRecommendations($exertId){
        
        $query = "SELECT * FROM expert_recommendation WHERE expertId=".$expertId;
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $data = ['status' =>false, 'recommendation' => ''];

        if(count($result)>0){
            
             $data['status'] = true;
             foreach($result as $r):
                $data['recommendation'] = $r['expert_recom'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }
    }
}
