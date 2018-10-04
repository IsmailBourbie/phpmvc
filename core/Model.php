<?php


namespace Core;

use PDO;
use App\Config;

abstract class Model {


   protected static function getDB()
   {
      static $db = null;
      if ($db == null){
         $dsn = 'mysql:host=' . Config::DATABASE('HOST') . ';dbname=' . Config::DATABASE('NAME');
         try {
            $db = new PDO($dsn, Config::DATABASE('USER'), Config::DATABASE('PASS'), Config::DATABASE('OPTIONS'));
         } catch(\PDOException $e){
            echo $e->getMessage();
         }
         return $db;
      }
   }
}