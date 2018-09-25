<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 25-09-2018
 * Time: 23:54
 */

namespace App;


class Config {

   public static function SHOW_ERROR()
   {
      return true;
   }

   public static function DATABASE($key)
   {
      switch ($key) {
         case 'HOST' :
            return '';
         case 'NAME' :
            return '';
         case 'USER' :
            return '';
         case 'PASS' :
            return '';
         default :
            return '';
      }

   }

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

   public static function ROOT($key)
   {
      switch ($key) {
         case 'APP':
            return str_replace('\\', '/', __DIR__ . DIRECTORY_SEPARATOR);
         case 'URL':
            return 'http://' . $_SERVER['HTTP_HOST'] . str_replace(
                  $_SERVER["DOCUMENT_ROOT"], "", str_replace(
                  '\\', '/', dirname(__DIR__) . DIRECTORY_SEPARATOR));
         default :
            return '';
      }
   }


}