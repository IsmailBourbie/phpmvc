<?php
//
//$router->get('', ['controller' => 'Home', 'action' => 'index']);
//$router->get('users', ['controller' => 'Users', 'action' => 'all']);
//$router->post('api/users', ['controller' => 'Users', 'action' => 'all', 'namespace' => 'Api']);
//$router->get('{controller}/{id:\d+}/{action}');
$router->post('{controller}/{id:\d+}/{action}');
$router->get('{lang:(?:fr|ar|en)}/{controller}/{action}');
$router->post('{lang:(?:fr|ar|en)}/{controller}/{action}');
$router->get('{controller}/{action}');// this route must be the last one!