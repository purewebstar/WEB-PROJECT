<?php

class Expert{

    private static $connector;

    public function __construct(){
        self::$connector = new Model();
    }

    public static function registerExperts($expert_data){
           
            $email = $expert_data['email'];
            $password = sha1($expert_data['password']);
            $lastName = $expert_data['firstName'];
            $firstName = $expert_data['firstName'];
            $birth = $expert_data['Birth'];
            $phone = $expert_data['Phone'];
            $address = $expert_data['address'];
            $city = $expert_data['City'];
            $country = $expert_data['Country'];

            $query = "
            INSERT INTO EXPERT(expertEmail, expertPassword, expertLastName, expertFirstName,
            expertBirth,expertAddress,expertCity,expertCountry) VALUES('$email','$password','$lastName'
            ,'$firstName','$birth','$phone','$address','$city','$country')
            ";

            $handler = self::$connector->getConnection();
            $statement = $handler->prepare($query);

            return $statement->execute();

    }

    public static function loginExperts($expert_data){
        $email = $expert_data['email'];
        $password = sha1($expert_data['password']);
        $query = "
        SELECT * FROM EXPERT WHERE expertEmail='$email' and expertPassword='$password'
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
                $data['email'] = $r['expertEmail'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }
    }

    public static function getCvList(){

        $query = 'SELECT * FROM CUST_CV';
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $data = ['status' =>false, 'cvName' => ''];

        if(count($result)>0){
            
             $data['status'] = true;
             foreach($result as $r):
                $data['cvName'] = $r['cvName'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }
    }

    public static function getCvDetail($cvId){

        $query = 'SELECT * FROM CUST_CV WHERE cvId='.$cvId;
        $handler = self::$connector->getConnection();
        $statement = $handler->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $data = ['status' =>false, 'cvName' => '', 'custId' => ''];

        if(count($result)>0){
            
             $data['status'] = true;
             foreach($result as $r):
                $data['cvName'] = $r['cvName'];
                $data['custId'] = $r['custId'];
             endforeach;
             
             return $data;
        }
        else{
            return $data;
        }
    }
}
