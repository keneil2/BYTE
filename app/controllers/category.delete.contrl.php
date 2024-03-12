<?php 
use app\models\AdminDb;
include_once "../models/admin.model.php";

if ($_SERVER["REQUEST_METHOD"]=="GET"){
   $deleteuser=new AdminDb();
   if($deleteuser->Deleteadmin($_GET["category_ID"],"categories")==true){
      exit("connection error");
   }
   header("Location:/Categories");
}