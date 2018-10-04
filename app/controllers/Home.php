<?php

namespace App\Controllers;


use App\Config;
use App\Models\User;
use Core\Controller;
use Core\View;

class Home extends Controller {


   public function indexAction()
   {
      $data = User::getById(1);
      View::render('home/index', $data);
   }
}