<?php

namespace Core;


/**
 * this class must extended by every controller
 * Class Controller
 * @package Core
 */
class Controller {

   protected $params = [];

   /**
    * Controller constructor.
    * @param array $params
    */
   public function __construct(array $params)
   {
      $this->params = $params;
   }

   public function __call($name, $args)
   {
      $method = $name . 'Action';
      if (!method_exists($this, $method))
         throw new \Exception('Method ' . $method . ' Not exist', 404);
      if ($this->before() !== false) {
         call_user_func_array([$this, $method], $args);
         $this->after();
      }
   }

   /**
    * this function overrated when we need to process something before call the method in controller
    * if fails return False
    */
   protected function before()
   {

   }


   /**
    * this function overrated when we need to process something after call the method in controller
    */
   protected function after()
   {

   }


}