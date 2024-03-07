<?php
require_once "../models/admin.model.php";
use app\models\AdminDb;
// require_once "../../config/session.php";
// Session::Sstart();
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
if (!isset($_POST["userName"]) && !isset($_POST["pwd"])) {
    $errors["userName_error"]="fileds cannot be empty";
}
$authenUser= new AdminDb();
// checking password
 $results=$authenUser->authenicate($userName,$Pwd) ?? "error!!";
 if ($results!==true){
    $errors["userName_error"]="Password or username incorrect";
    
 }
if (isset($errors)){
     $_SESSION["Admin_Login_errors"]=$errors;
     header("Location:/admin-login");
     exit;
}
setcookie("login_status",true,time()+3600,"/");
header("Location:/manage-Admins");
}