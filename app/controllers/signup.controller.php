<?php
require 'vendor/autoload.php';
require_once "Errors_controller.php";
require_once "app/../../models/Register.model.php";
require_once "varification.contrl.php";
use varEmail\Varification_controller;
use app\controllers\Error;
// require_once "config/session.php";
// \Session::Sstart();
 // this function handles errors and store them in a session to be displayed 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    Error::logErrors($_POST["Email"]);
     // generates verification code
    try{
        // checking the input fields
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
        $userName=Error::sanitizeInput(trim($_POST["userName"]));
        $password=Error::sanitizeInput($_POST["Password"]);
        $email=Error::validateEmail(trim($_POST["Email"]));

        // this is the email that I will be check in the varification controller file
        setcookie("var_email",$email,time()+3000,'/');
        $code=Varification_controller::varificationCode();

        // this function will send the email  using a PHP lib called PHPMailer pass:rata fkpi rvhj ztdc
   Varification_controller::checkEmailExist($email,$code,$userName);

        // setting a cookie to store  the code not really recommend but wanted to use it as practice
        setcookie("Var_code", $code,time()+ 360,"/");

        // setting a cookie for the username to use later
        setcookie("userName", $userName,time()+ 360,"/");

        $_SESSION["Var_Code"]=$code;// setting the session code

        // status for the email it is always false until i can change it
        $status="Inactive";

        // inserting data into the database
        Register::insertData($userName,password_hash($password,PASSWORD_BCRYPT),$email,$code,$status);

        //sending the user to a var page to varify email
        header("Location:/Email_varification");
        exit("email sent");
    }else{
        header("Location:/signup");
    }
}catch (Exception $e){
    header("Location:/signup"); 
    exit("Error: ".$e->getMessage());
}
}