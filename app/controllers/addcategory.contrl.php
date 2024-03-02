<?php
use app\models\AdminDb;
require "../models/admin.model.php";
spl_autoload_register(function($class){
    require "$class"."s_controller.php";
});

$error=[];
 function handleinput($featured){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST["category_name"]) && isset($_POST["toFeature"])  ){
        $categoryname=$_POST["category_name"];
        $isFetaured=$_POST["toFeature"];
}else{

}
}else{
    exit("");
}
}
class Addcategory_controller{
    private $category;
    private $isFeatured;
    public function __set($name,$value){
        $this->category= $name;
        $this->isFeatured=$value;
    }
}