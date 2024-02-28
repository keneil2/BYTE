<?php
use app\controllers\AdminDb;
// include_once "layout/admin.nav.php";

include_once "app/models/admin.model.php";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    echo "update controler";
   $upadate=new AdminDb();
   echo $_POST["id"];
   $upadate->updateUser($_POST["usename"],$_POST["email"],$_POST["id"]);


}