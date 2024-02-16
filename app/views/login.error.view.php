<?php 
// require_once "../models/signup.controller.php";
// echo $_SESSION["login_errors"];
if ($_SESSION["login_errors"]){
    echo "what". $_SESSION["login_errors"];
    exit();
}
    if ($_SESSION["Login_status"]==false){
    echo "<p font-color='red'>useraname or password is in correct!</p>";
    exit();
}