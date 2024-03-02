<?php use  app\controllers\Error;
use app\models\AdminDb;
 spl_autoload_register(function($class){
         require_once "$class"."s_controller.php";
         require_once "app/models/admin.model.php";
    });
    
    // require_once "Errors_controller.php";
     // filtering vars
    Error::handleAllError("POST",["title","price","itemDescription"],URLPATH:"/create_Content");
      if (Error::isRequestMethod("POST")){
        $title=Error::sanitizeInput($_POST["title"]);
        $price=Error::sanitizeInput($_POST["price"]);
        $descrition=Error::sanitizeInput($_POST["itemDescription"]);
        
      }


