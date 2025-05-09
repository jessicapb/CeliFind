<?php 
    namespace App\Infrastructure\Database;

    class DatabaseConnection{
        private static \PDO $db;

        public static function getConnection(){
            if(!empty(self::$db)){
                return self::$db;
            }else{
                $db_info=[
                    'dsn'=>"mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'],
                    'dbuser'=>$_ENV['DB_USER'],
                    'dbpassword'=>$_ENV['DB_PASSWORD']    
                ];
                try{
                    self::$db=new \PDO($db_info['dsn'], $db_info['dbuser'],$db_info['dbpassword']);
                }catch(\PDOException $e){
                    die($e->getMessage());
                }
            }
            return self::$db;
        }

    }