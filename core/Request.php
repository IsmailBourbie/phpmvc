<?php


namespace Core;


class Request {

   public static function uri()
   {
      $uri = rtrim($_SERVER['QUERY_STRING'], '/');
      return self::removeQueryString($uri);
   }


   private function removeQueryString($uri)
   {
      if ($uri != '') {
         // split the string to 2 strings
         $parts = explode("&", $uri, 2);
         // if the controller have = sign so uri = ""
         if (strpos($parts[0], "=") === false) {
            $uri = $parts[0];
         } else {
            $uri = "";
         }
      }
      return $uri;
   }
   public static function method()
   {
      return $_SERVER['REQUEST_METHOD'];
   }

}