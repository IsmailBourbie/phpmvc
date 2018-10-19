<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 25-09-2018
 * Time: 23:54
 */

namespace App;

use PDO;

class Config {

   /**
    * show error on developing and hide it on production
    * @return bool
    */
   public static function SHOW_ERROR()
   {
      return true;
   }


   /**
    * Databases configurations (host, dbname,user, pass, options[])
    * @param $key
    * @return array|string
    */
   public static function DATABASE($key)
   {
      switch ($key) {
         case 'HOST' :
            return 'localhost';
         case 'NAME' :
            return 'test';
         case 'USER' :
            return 'root';
         case 'PASS' :
            return '';
         case 'OPTIONS':
            return [
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
         default :
            return '';
      }

   }

   /**
    * General's site configurations (name, lang...)
    * @param $key
    * @return string
    */
   public static function SITE($key)
   {
      switch ($key) {
         case 'NAME' :
            return 'phpmvc';
         case 'LANG':
            return 'en';
         default:
            return '';
      }
   }

   /**
    * Paths config
    * @param $key
    * @return string
    */
   public static function ROOT($key)
   {
      switch ($key) {
         case 'APP':
            return str_replace('\\', '/', __DIR__ . DIRECTORY_SEPARATOR);
         case 'URL':
            return 'http://' . $_SERVER['HTTP_HOST'] . str_replace(
                  $_SERVER["DOCUMENT_ROOT"], "", str_replace(
                  '\\', '/', dirname(__DIR__) . DIRECTORY_SEPARATOR));
         case 'DIR' :
            return str_replace('\\', '/', dirname(__DIR__) . DIRECTORY_SEPARATOR);
         default :
            return '';
      }
   }


}