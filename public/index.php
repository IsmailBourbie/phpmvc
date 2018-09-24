<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 21-09-2018
 */


// require the autoload
require '../vendor/autoload.php';

$router = new \Core\Router();


$router->get('users', ['controller' => 'users', 'action' => 'all']);
$router->get('{controller}/{action}');
$router->post('{controller}/{action}');


$router->dispatch(Core\Request::uri(), \Core\Request::method());