<?php 
use app\controllers\AdminDb;
include_once "app/models/admin.model.php";

if ($_SERVER["REQUEST_METHOD"]=="GET"){
   $deleteuser=new AdminDb();
   $deleteuser->Deleteadmin($_GET["user_id"]);
   header("Location:/manage-Admins");
}