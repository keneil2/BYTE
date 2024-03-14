<?php 
use app\controllers\Error;
use app\models\AdminDb;
spl_autoload_register(function($class){
 require_once $class."s_controller.php";
 require_once dirname(__FILE__,2)."/models/admin.model.php";
});


if(Error::isRequestMethod("POST")){
    Error::handleAllError($_POST,["food_name","Price","description"],URLPATH:"/productUpdate");
    $updatedName=Error::sanitizeInput($_POST["food_name"]);
    $updatedPrice=Error::sanitizeInput($_POST["Price"]);
    $updatedDescription=Error::sanitizeInput($_POST["description"]);
    $updateitem= new AdminDb();
    $updateitem->setTablename("foods");
    $updateitem->setColumns(['food_name',"price","description"]);
    $updateitem->updatefieldstring($_POST["id"],[$updatedName,$updatedPrice,$updatedDescription]);
    $_SESSION["product_admin_message"]="product updated sucessfully";
    header("Location:/productUpdate");
    exit;

}