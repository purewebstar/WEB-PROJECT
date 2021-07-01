<?php

class Admin{

    protected static $connector;

    public function __construct(){
        self::$connector = new Model();
    }

    public static function loginAdmin($admin_data){

        $email = $admin_data['email'];
        $password = sha1($admin_data['password']);
        $query = "
        SELECT * FROM ADMIN_ WHERE adminEmail='$email' and adminPassword='$password'
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
                $data['email'] = $r['adminEmail'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }

    }

    public static function activateExperts($expertId){

    }

    public static function deactivateExperts($expertId){

    }

    public static function createExpert($expert){
        $email = $expert['email'];
        $password = $expert['password'];
        $firstName = $expert['firstName'];
        $lastName = $expert['lastName'];
        $phone = $expert['phone'];
        $address= $expert['address'];
        $city = $expert['city'];
        $country = $expert['country'];

        $query = "
         INSERT INTO EXPERT (expertEmail,exertPassword,expertLastName,expertFirstName, expertPhone,expertAddress,expertCity,expertCountry)
         VALUES
         ('$email','$password','$firstName','$lastName','$phone','$address','$city','$country')
        ";
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);

        return $statement->execute();
    }

    public static function readExpert($expertId){
        
        $query = "
         SELECT * FROM EXPERT WHERE expertId=
        ".$expertId;
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $data = ['status' => true];
        $response = [];
        foreach($result as $expert){

            $email = $expert['expertEmail'];
            $password = $expert['expertPassword'];
            $firstName = $expert['expertFirstName'];
            $lastName = $expert['ExpertLastName'];
            $phone = $expert['expertPhone'];
            $address= $expert['expertAddress'];
            $city = $expert['expertCity'];
            $country = $expert['expertCountry'];

         }
        array_push($data, $response);
        return $data;
    }

    public static function updateExpert($expertId, $expert){
        
        $email = $expert['email'];
        $password = $expert['password'];
        $firstName = $expert['firstName'];
        $lastName = $expert['lastName'];
        $phone = $expert['phone'];
        $address= $expert['address'];
        $city = $expert['city'];
        $country = $expert['country'];

        $query = "
         UPDATE EXPERT SET expertEmail='.$email.'expertPassword='.$password.'
         .'expertFirstName='.$expertFirstName'.'expertLastName='.$expertLastName WHERE expertId='$expertId'
        ";
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);

        return $statement->execute();
    }

    public static function deleteExpert($expertId){
        
        $query = "DELETE FROM EXPERT WHERE expertId=".$expertId;
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);

        return $statement->execute();
    }
}
