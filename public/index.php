<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 21-09-2018
 */


// require the autoload
require '../vendor/autoload.php';

$router = new \Core\Router();


$router->get('users',['controller' => 'users', 'action' => 'all']);
$router->post('{controller}/{action}');


var_dump(Core\Request::uri());