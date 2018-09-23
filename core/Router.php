<?php

namespace Core;


class Router {

   public $routes = [
      'GET'    => [],
      'POST'   => [],
      'PUT'    => [],
      'DELETE' => []
   ];
   public $params = [];


   /**
    * add function to convert a string to pattern
    * @param $route
    * @return mixed|string
    */
   private function convertToRegex($route)
   {
      $route = preg_replace('/\//', '\\/', $route);

      $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

      // pattern for id {id:\d+} or name
      $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
      $route = '/^' . $route . '$/i';
      return $route;
   }

   // add routes for GET METHOD
   public function get($route, $params = [])
   {
      $route = $this->convertToRegex($route);
      $this->routes['GET'][$route] = $params;
   }

   // add routes for POST METHOD
   public function post($route, $params = [])
   {
      $route = $this->convertToRegex($route);
      $this->routes['POST'][$route] = $params;
   }

   // add routes for PUT METHOD
   public function put($route, $params = [])
   {
      $route = $this->convertToRegex($route);
      $this->routes['PUT'][$route] = $params;
   }

   // add routes for DELETE METHOD
   public function delete($route, $params = [])
   {
      $route = $this->convertToRegex($route);
      $this->routes['DELETE'][$route] = $params;
   }

   public function match($uri, $requestType)
   {
      foreach ($this->routes[$requestType] as $route => $params) {
         // if the uri is matched so capture matches
         if (preg_match($route, $uri, $matches)) {
            foreach ($matches as $key => $match) {
               // if the match captured is string so add it to params
               if (is_string($key)) {
                  $params[$key] = $match;
               }
            }
            $this->params = $params;
            return true;
         }
      }
      return false;
   }

   public function dispatch($uri)
   {

   }
}




