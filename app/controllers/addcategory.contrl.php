<?php
use app\models\AdminDb;
 use app\controllers\Error;
require_once "app/models/admin.model.php";
spl_autoload_register(function($class){
    require "$class"."s_controller.php";
});

$error=[];
 function handleinput(){
    if($_SERVER["REQUEST_METHOD"]=="GET"){ 
        Error::handleAllError($_GET,"category_name","toFeature",);
        if (isset($_GET["category_name"]) && isset($_GET["toFeature"])  ){
        $categoryname=$_GET["category_name"];
        $isFetaured=$_GET["toFeature"];
        $createCategory= new AdminDb();
        $createCategory->createCategory( $categoryname,$isFetaured);
}
}else{
    $_SESSION["requestMethod_error"]="invalid input Method";
    header("Location:/new-category");
    exit("invalid input Method");
}
}
handleinput();