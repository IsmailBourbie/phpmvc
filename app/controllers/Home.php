<?php

namespace App\Controllers;


use App\Config;
use Core\Controller;
use Core\View;

class Home extends Controller {


   public function indexAction()
   {
      $data = [
         'title' => 'Home',
         'name'  => 'Ismail'
      ];
      View::render('home/index', $data);
   }
}