<?php
require_once "../models/admin.model.php";
use app\models\AdminDb;
require_once "../../config/session.php";
Session::Sstart();
function sanitizeInput($input) {
    if (isset($input)) {
    $input=filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
# just logging errors here
$errors=[];
$userName=sanitizeInput($_POST["userName"]);
$Pwd=sanitizeInput($_POST["pwd"]);
if (empty($_POST["userName"]) || empty($_POST["pwd"])) {
    $errors["userName_error"]="fileds cannot be empty";
}
$authenUser= new AdminDb();
// checking password
if (!empty($_POST["userName"]) || !empty($_POST["pwd"])) {
 $results=$authenUser->authenicate($userName,$Pwd) ?? "error!!";
 if ($results==false){
    $errors["userName_error"]="Password or username incorrect";
    
 }else{
    setcookie("login_status",true,time()+3600,"/");
header("Location:/manage-Admins");
exit;
 }}
if (isset($errors)){
     $_SESSION["Admin_Login_errors"]=$errors;
     var_dump($_SESSION["Admin_Login_errors"]);
     header("Location:/admin-login");
     exit;
}

}