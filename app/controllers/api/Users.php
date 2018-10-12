<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 12-10-2018
 * Time: 16:43
 */

namespace App\Controllers\Api;


use Core\Controller;
use Core\View;

class Users extends Controller {

   public function allAction()
   {
      $response = ['status' => 'OK', 'message' => 'Your request is valid'];
      View::renderJson($response);
   }

}