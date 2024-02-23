<?php
use app\controllers;
use app\controllers\AdminDb;
require_once "../../comfig/session.php";
Session::Sstart();
function sanitizeInput($input) {
    if (isset($input)) {
    $input=filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$errors=[];
$userName=sanitizeInput($_POST["userName"]);
$Pwd=sanitizeInput($_POST["pwd"]);
if (!isset($_POST["userName"]) && !isset($_POST["pwd"])) {
    $errors["userName_error"]="fileds cannot be empty";
}

if (isset($errors)){
     $_SESSION["Admin_Login_errors"]=$errors;
}
}