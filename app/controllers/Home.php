<?php

namespace App\Controllers;


use App\Config;
use App\Models\User;
use Core\Controller;
use Core\View;

class Home extends Controller {


   public function indexAction()
   {
      $user = User::getById(1);
      $response = [
         'user'  => $user,
         'title' => 'Home'
      ];
      View::renderTemplate('home/index.php', $response);
   }
}