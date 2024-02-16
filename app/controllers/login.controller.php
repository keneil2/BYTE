<?php
var_dump(session_status());
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION["login_email"]=null;
    $_SESSION["login_pwd"]=null;
    if(empty($_POST["username"]) && empty($_POST["email"]) && empty($_SESSION["pwd"])){
        $_SESSION["login_errors"]="please Enter your credentials";
        header("Location:/login"); 
    }else{
    if(isset($_POST["email"]) && isset($_POST["pwd"])){
        $email = htmlspecialchars($_POST["email"]);
        $pwd= htmlspecialchars($_POST["pwd"]);
        // setting  users credentials in a sessions lol not sure why i did this;
     $_SESSION["login_email"]=htmlspecialchars($_POST["email"]);
     $_SESSION["login_pwd"]=htmlspecialchars($_POST["pwd"]);



    // checking users pwd
     require_once "../models/login.model.php";
$results=Login_model::canLogin($_POST["email"],$_POST["pwd"]);
// var_dump($results);


if ($results){
    $_SESSION["Login_status"]=true;
    header('Location:/home');
    // exit();
}else{
    $_SESSION["Login_status"]=false;
    header("Location:/login");
  }
}
    }
}
