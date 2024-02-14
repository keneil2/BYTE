<?php
// this page handles errors and uses input 
function Sstart(){
    ini_set("session.use_only_cookies",1);
    session_set_cookie_params( [
        "lifetime"=> 1800,
        "path"=> "/",
        "domain"=> "localhost",
        "secure"=> true,
        "httponly"=> true,
        
    ]);
    
    session_start();
    // session_regenerate_id(true);
    if(empty($_SESSION["last Activity"])){
        $_SESSION["last Activity"] = time();
    }else{
        if(time()-$_SESSION["last Activity"]>=1800){
           session_regenerate_id(true);
           $_SESSION["last Activity"] = time();
        }
    }
}

Sstart();


require_once "app/../../models/Register.model.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){

    function disPlayError(){
        global    $userName ;
        global  $Password;
        global  $email;
        $errors=[];
        if(empty($_POST["userName"]) || empty( $_POST["Password"]) || empty($_POST["Email"])){
         $errors["input_error"]="please fill out all fields!!";
        }
        if(!empty($_POST["Email"]) && isset( $_POST["Email"])){
        if(Register::isEmailExist($_POST["Email"])==true){
       $errors["email_exixt_in_DB"]="email already exist <a href='/login'>Go To login Page<a>";
        }}
        if(isset($errors)){
        
            $_SESSION["client_side_Errors"]=$errors; 
        }else{
        $errors;
        } 
     }
     // calling the function to handle errors in errors.view.php
     disPlayError();
    try{
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
        $userName=htmlspecialchars($_POST["userName"]);
        $email=htmlspecialchars($_POST["Email"]);
        $password=htmlspecialchars(password_hash($_POST["Password"],PASSWORD_BCRYPT));
         Register::insertData($userName,$password,$email);
         $_SESSION["signup_status"] = "sucessfull";
           header("Location:/login");
 exit("scrpit");
 
    }else{
        header("Location:/signup");
    }
}catch (Exception $e){
    header("Location:/signup");
    exit("Error: ".$e->getMessage());
}}
 