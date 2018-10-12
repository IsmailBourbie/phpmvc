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

   public function dispatch($uri, $requestType)
   {
      if (!$this->match($uri, $requestType)) {
         throw new \Exception("No Route match", 404);
      }

      $controller = $this->params['controller'];
      $controller = $this->convertToStudlyCaps($controller);
      $controller = $this->getNamespace() . $controller;

      if (!class_exists($controller))
         throw new \Exception('Class "' . $controller . '" not exist', 404);

      $controller_object = new $controller($this->params);

      $action = $this->params['action'];
      $action = $this->convertToCamelCase($action);
      // if action name match (action) throw exception
      if (preg_match('/action$/i', $action) != 0)
         throw new \Exception('Method "' . $action . '" not exist in Class ' . $controller);
      $controller_object->$action();

   }


   private function convertToStudlyCaps($str)
   {
      return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
   }

   private function convertToCamelCase($str)
   {
      return lcfirst($this->convertToStudlyCaps($str));
   }

   private function getNamespace()
   {
      $namespace = 'App\Controllers\\';
      if (array_key_exists('namespace', $this->params)) {
         $namespace .= $this->params['namespace'] . '\\';
      }
      return $namespace;
   }
}






