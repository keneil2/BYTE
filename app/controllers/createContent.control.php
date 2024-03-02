<?php use  app\controllers\Error;;
 spl_autoload_register(function($class){
         require_once "$class"."s_controller.php";
    });
    // require_once "Errors_controller.php";
     // filtering vars
      if (Error::isRequestMethod("POST")){
         
      }


