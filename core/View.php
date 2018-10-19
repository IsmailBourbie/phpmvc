<?php

namespace Core;


use App\Config;

class View {

   public static function render($view, $data = [])
   {
      // extract variables from data array's
      extract($data, EXTR_SKIP);
      $file = \App\Config::ROOT('APP') . "views/{$view}.php";
//      die(var_dump($file));
      if (!file_exists($file))
         throw new \Exception('View: ' . $view . ' not found');
      require $file;
   }

   public static function renderTemplate($template, $args = [])
   {
      static $twig = null;
      if ($twig === null) {
         $loader = new \Twig_Loader_Filesystem(Config::ROOT('APP') . "views");
         $twig = new \Twig_Environment($loader);
         $filter = new \Twig_Filter('lang', function ($key) {
            return Lang::get($key);
         });
         $twig->addFilter($filter);
         $twig->addGlobal('config', new Config());
      }
      echo $twig->render($template, $args);
   }

   public static function renderJson($data = [])
   {
      header("Content-type: application/json");
      echo json_encode($data);
   }

}