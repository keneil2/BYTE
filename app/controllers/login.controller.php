<?php
require_once "../../config/session.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION["login_email"]=null;
    $_SESSION["login_pwd"]=null;
    $errors=[];
    if(empty($_POST["username"]) && empty($_POST["email"]) && empty($_SESSION["pwd"])){
        $errors["empty_fields"]="please Enter your credentials";
        header("Location:/login");
    }else{
        try{ // setting an error handler to catch any errors
        $email = htmlspecialchars($_POST["email"]);
        $pwd= htmlspecialchars($_POST["pwd"]);
        // setting  users credentials in a sessions lol not sure why i did this;
     $_SESSION["login_email"]=htmlspecialchars($_POST["email"]);
     $_SESSION["login_pwd"]=htmlspecialchars($_POST["pwd"]);



    // checking users pwd
     require_once "../models/login.model.php";
$results=Login_model::canLogin($_POST["email"],$_POST["pwd"]);

// checking the password
if ($results){
    $_SESSION["Login_status"]=true;
    header('Location:/home');
    exit();
}else{
    $_SESSION["Login_status"]=false;
    $errors["credential_errors"]="User name or password is incorrect";
}
    
    if(isset($errors)){
        $_SESSION["login_errors"]=$errors;
        header("Location:/login");
        exit();
} }
catch(Exception $e){
   echo $e->getMessage();
    header("Location:/login");
    exit();
}
}
}