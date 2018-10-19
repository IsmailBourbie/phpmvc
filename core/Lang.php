<?php

namespace Core;


use App\Config;

class Lang {

   private static $data;

   public static function load($lang)
   {
      $file = Config::ROOT('DIR') . 'lang/' . $lang . '.php';
      if (!file_exists($file))
         throw new \Exception('Lang file ' . $lang . 'not found');
      self::$data = require($file);
   }

   public static function get($key)
   {
      return self::$data[strtolower($key)];
   }

   /**
    * @return mixed
    */
   public static function getData()
   {
      return self::$data;
   }
}