<?php
/**
 * Created by PhpStorm.
 * User: IsMail BoUrbie
 * Date: 21-09-2018
 */

use Core\Router;
use Core\Request;

// require the autoload
require '../vendor/autoload.php';

/**
 * Errors and Exceptions handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

Router::load('routes.php')
   ->dispatch(
      Request::uri(),
      Request::method()
   );