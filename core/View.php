<?php

namespace Core;


class View {

   public static function render($view, $data = [])
   {
      // extract variables from data array's
      extract($data, EXTR_SKIP);
      $file = \App\Config::ROOT('APP') . "views/{$view}.php";
      if (!file_exists($file))
         throw new \Exception('View: ' . $view . ' not found');
      require $file;
   }

   public static function renderJson($data = [])
   {
      header("Content-type: application/json");
      echo json_encode($data);
   }

}