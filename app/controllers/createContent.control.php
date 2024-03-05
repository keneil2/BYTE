<?php use  app\controllers\Error;
use app\models\AdminDb;
 spl_autoload_register(function($class){
        if(file_exists("$class"."s_controller.php")){ 
          require_once "$class"."s_controller.php";
        }else{
          require_once $class.".controller.php";
        }

         require_once "app/models/admin.model.php";
    });
    
    // require_once "Errors_controller.php";
     // filtering vars
     try{
      if (Error::isRequestMethod("POST")){
        Error::logFileErrors();
        file::checkFileType($_FILES["pic"]["tmp_name"]);
    Error::handleAllError($_POST,["title","price","itemDescription"],URLPATH:"/create_Content");
    file::movefile($_FILES["pic"]["name"],$_FILES["pic"]["tmp_name"]);

        $title=Error::sanitizeInput($_POST["title"]);
        $price=Error::sanitizeInput($_POST["price"]);
        $descrition=Error::sanitizeInput($_POST["itemDescription"]);

      }else{
        $_SESSION["request_method"]="invalid request Method";;
      }}catch(\Exception $e){
        $_SESSION["debug_errors"]=$e->getMessage();
      }


