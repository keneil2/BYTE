<?php 
use app\models\AdminDb;
include_once "app/models/admin.model.php";

if ($_SERVER["REQUEST_METHOD"]=="GET"){
   $deleteuser=new AdminDb();
   if($deleteuser->Deleteadmin($_GET["user_id"])==true){
      exit("connection error");
   }
   
   header("Location:/manage-Admins");
}