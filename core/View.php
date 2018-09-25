<?php

namespace Core;


class View {

   public static function render($view, $data = [])
   {
      // extract variables from data array's
      extract($data, EXTR_SKIP);
      $file = dirname(__DIR__) . "/app/views/{$view}.php";
      if (!file_exists($file))
         throw new \Exception('View: ' . $view . ' not found');
      require $file;
   }

}