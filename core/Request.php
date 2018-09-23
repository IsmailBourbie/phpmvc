<?php


namespace Core;


class Request {

   public static function uri()
   {
      $uri = $_SERVER['QUERY_STRING'];
      return $uri;
   }

}