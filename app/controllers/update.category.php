<?php 
use app\controllers\Error;
use app\models\AdminDb;
spl_autoload_register(function($class){
    if(file_exists($class."s_controller.php")){
        require_once $class."s_controller.php";
    }
  require_once dirname(__FILE__,2)."/models/admin.model.php";
});
if (Error::isRequestMethod("POST")){
    $categoryname=Error::sanitizeInput($_POST["category"]);
    $display=Error::sanitizeInput("display");
  Error::handleAllError($_POST,["category","display"],URLPATH:"/update_Category?eee",errorName:"category_update");
  $update=new AdminDb();
  $update->setColumns(["CATEGORY_NAME","to_feature"]);
  $update->setTablename("categories");
  $update->updatefieldstring($_POST["id"],[$categoryname,$display]);
    $_SESSION['m']="good!!";
}