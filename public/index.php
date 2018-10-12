<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 21-09-2018
 */


// require the autoload
require '../vendor/autoload.php';

/**
 * Errors and Exceptions handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new \Core\Router();


$router->get('', ['controller' => 'Home', 'action' => 'index']);
$router->get('users', ['controller' => 'Users', 'action' => 'all']);
$router->post('api/users', ['controller' => 'Users', 'action' => 'all', 'namespace' => 'Api']);
$router->get('{controller}/{action}');// this route must be the last one!


$router->dispatch(Core\Request::uri(), \Core\Request::method());