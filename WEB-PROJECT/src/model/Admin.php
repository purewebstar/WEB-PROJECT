
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
        
    }

    public static function readExpert($expertId){
        
    }

    public static function updateExpert($expertId){
        
    }

    public static function deleteExpert($expertId){
        
    }
}
