<?php
use app\models\AdminDb;
use app\controllers\Error;
spl_autoload_register(function($class){
    require_once $class."s_controller.php";
});
// include_once "layout/admin.nav.php";

include_once "app/models/admin.model.php";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $userName=Error::sanitizeInput($_POST["usename"]);
  $email=Error::validateEmail($_POST["email"]);
  Error::handleAllError($_POST,["email","usename"],URLPATH:"/update-admins");
  echo $email;
  $upadate=new AdminDb();
  $upadate->updateUser($userName,$email,$_POST["id"]);
  $_SESSION["update_admin_message"]="user added successfully";
  header("Location:/update-admins");
  exit;
}