<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $_SESSION["login_email"]=null;
    $_SESSION["login_pwd"]=null;
    $errors=[];
    if(empty($_POST["username"]) && empty($_POST["email"]) && empty($_SESSION["pwd"])){
        $errors["empty_fields"]="please Enter your credentials";
    }else{
        // setting the cookie to store users name
        setcookie("username", $_POST["username"],time() + 3600, "/");
        try{ // setting an error handler to catch any errors
        $email = htmlspecialchars($_POST["email"]);
        $pwd= htmlspecialchars($_POST["pwd"]);
        // setting  users credentials in a sessions lol not sure why i did this;
     $_SESSION["login_email"]=htmlspecialchars($_POST["email"]);
     $_SESSION["login_pwd"]=htmlspecialchars($_POST["pwd"]);


    // checking users pwd
     require_once "../models/login.model.php";
     // this class is reponsible for checking if the password and email are correct
$results=Login_model::canLogin($_POST["email"],$_POST["pwd"],$_POST["username"]);

// checking the password
if ($results){

    // setting login status to true if the user and password and email is correct
    $_SESSION["Login_status"]=true;

    // sending the user to the login page if they are sucessful
    header('Location:/home');
    exit();
}else{
    // setting an error if the user can't login
    $_SESSION["Login_status"]=false;
    $errors["credential_errors"]="User name or password is incorrect";
}
   }

   // cathing errors if there are other errors for dev purposes
catch(Exception $e){
   echo $e->getMessage();
    header("Location:/login");
    exit();
}
}
// checking if there are any errors and storing them in a  session
if(isset($errors)){
    $_SESSION["login_errors"]=$errors;
    header("Location:/login");
    exit();
} 
}