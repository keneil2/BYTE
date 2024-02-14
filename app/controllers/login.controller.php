<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION["login_email"]=null;
    $_SESSION["login_pwd"]=null;
    if(isset($_POST["email"]) && isset($_POST["pwd"])){
        $email = htmlspecialchars($_POST["email"]);
        $pwd= htmlspecialchars($_POST["pwd"]);
        // getting users credentials in a sessions lol not sure why i did this;
     $_SESSION["login_email"]==htmlspecialchars($_POST["username"]);
     $_SESSION["login_pwd"]==htmlspecialchars($_POST["pwd"]);

    // checking users pwd
     require_once "../models/login.model.php";
$results=Login_model::canLogin($_POST["email"],$_POST["pwd"]);
if ($results){
    $_SESSION["Login_status"]=true;
    header('Location:/home');
    exit();
}else{
    $_SESSION["Login_status"]=false;
    header("Location:/login");
    exit();
}
}else{
    echo"<p>please enter email and  password to Login <a href='/signup' >go here to sign up</a><p> ";
    exit();
}
    }
