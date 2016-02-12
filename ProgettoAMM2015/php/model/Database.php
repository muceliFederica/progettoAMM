<?php
class Database {
    
    private function __construct() {
        
    }
    
    private static $singleton;
 
    public static function getInstance(){
        if(!isset(self::$singleton)){
            self::$singleton = new Database();
        }
        
        return self::$singleton;
    }
    
    public function connectDb(){
        $mysqli = new mysqli();
        /*$mysqli->connect("localhost","muceliFederica",
        "pulcinella8499", "amm15_muceliFederica");*/
        
         $mysqli->connect("localhost","root",
        "pulcinella8499", "amm15_muceliFederica"); 
        if($mysqli->errno != 0){
            return null;
        }else{
            return $mysqli;
        }
    }
}
?>