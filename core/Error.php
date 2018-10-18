<?php

namespace Core;


use App\Config;

class Error {

   /**
    * this method used to convert an error to an exception
    * @param $level
    * @param $message
    * @param $file
    * @param $line
    * @throws \ErrorException
    */
   public static function errorHandler($level, $message, $file, $line)
   {
      if (error_reporting($level) != 0) //to keep @ working
         throw new \ErrorException($message, 0, $level, $file, $line);
   }

   /**
    * this method used to Handel exception
    * @param $exception
    */
   public static function exceptionHandler($exception)
   {
      $code = $exception->getCode();

      if ($code != 404) {
         $code = 500;
      }
      http_response_code($code);
      if (Config::SHOW_ERROR()) {
         echo "<h1>Fatal error</h1>";
         echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
         echo "<p>Message: '" . $exception->getMessage() . "'</p>";
         echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
         echo "<p>Throw in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
      } else {
         $log = Config::ROOT('DIR') . '/logs/' . date('Y-m-d') . '.txt';
         ini_set('error_log', $log);

         $message = "\nUncaught exception: '" . get_class($exception) . "'";
         $message .= "Message: '" . $exception->getMessage() . "'";
         $message .= "\nStack trace:" . $exception->getTraceAsString();
         $message .= "\nThrow in '" . $exception->getFile() . "' on line " . $exception->getLine();
         $message .= "\n----------------------------------------------------------";
         error_log($message);

         if (Request::isApiCall()) {
            $response = ['Status' => 'wrong', 'message' => 'an exception was occur'];
            View::renderJson($response);
         } else {
            View::renderTemplate($code . '.php');
         }
      }
   }
}