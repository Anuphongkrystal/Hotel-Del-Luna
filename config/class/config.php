<?php
  class connect{
    public static $e;
    public static $database;
    public static $DIR = "/hotel-del-luna";
    public stati function _DB(){
      try{
        self::$database = new PDO('mysql:host=127.0.0.1;dbname=hotel-del-luna;charset=utf8mb4','root','');
        self::$database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo $e->getMessage();
      }
      return self::$database;
    }
  }
 ?>
