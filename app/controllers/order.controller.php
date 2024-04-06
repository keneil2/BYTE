<?php
use app\controllers\Error;
use Stripe\Stripe;
require_once dirname(__FILE__,3)."/vendor/autoload.php";
spl_autoload_register(function($class){
require_once $class."s_controller".".php";
});
 require_once dirname(__FILE__, 2) . "/models/orders_model.php";
require_once dirname(__FILE__,3)."/config/dbcon.php";
require_once "app/models/admin.model.php";
require_once dirname(__FILE__,3)."/config/ExceptionClass.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__,3),"/config");
$dotenv->load();

$stripe_api_key=$_ENV["STRIPE_API_KEY"];
$stripe=new Stripe;
$stripe::setApiKey($stripe_api_key);
try{
$errorcontroller=new Error;
if($errorcontroller->isRequestMethod("POST")){
   $errorcontroller->handleAllError($_POST,["name","cardNum","date","CVC"],URLPATH:"/orderPage",errorName:"order_errors");
   if(preg_match("/^[a-zA-z]+$/",$_POST["name"]) && preg_match("/[0-9]+/",$_POST["cardNum"]) && preg_match("/[0-9]+\/[0-9]+\/[0-9]{4}/",$_POST["date"]) && preg_match("/[0-9]{3}/",$_POST["CVC"])){
      
      // throw new InputErrors("please ensure you enter the correct information!");
   }
    if($errorcontroller->isRequestMethod("POST") && isset($_POST["upadteAdress"])){
      $updateAddress=new order_model;
      $updateAddress-> updateAddress($_POST["address"]);
      $_SESSION["addressupdtae"]="address Updated sucessfully";
    }

}
}catch(Exception $e){
$_SESSION["order_error"]=$e->getMessage();
}