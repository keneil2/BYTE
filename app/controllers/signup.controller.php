<?php
spl_autoload_register(function ($class) {
    // chdir("app");
    require_once("app/model/../Register.model.php");
    // require "MVC FRAMEWORK/../config/".$class.".php";
});
// require_once "../config/session.php";


echo getcwd();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    try{
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
        $userName=htmlspecialchars($_POST["userName"]);
        echo $userName;
        $email=htmlspecialchars($_POST["Email"]);
        $password=htmlspecialchars(password_hash($_POST["Password"],PASSWORD_BCRYPT));
         Register::insertData($userName,$password,$email);
    }else{
     exit("user data not saved");
    }
}catch (Exception $e){
    exit("Error: ".$e->getMessage());
}}

// creating A class for errors 
function disPlayError(){
    $errors=[];
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
     $error["input_error"]="fields connot be empty!!";
    }
    if(Register::isEmailExist($_POST["Email"])==true){
   $errors["email_exixt_in_DB"]="email already exist <a href='app/views/login.php'>Go To login Page<a>";
    }
    if(!$errors){
        return $_SESSION["client_side_Errors"]=$errors;
    }else{
        return $errors;
    }
 }
 class Display{
     public static function Errors(){
        $result=disPlayError();
        if($result!==[]){
        foreach($result as $typeE=>$error){
        echo "<p style='color:red; font-weight:bold;'>$error<p>";
        }
        header("Location:/signup");
        exit();
     }
 }
 }
 Display::Errors();

//  ampp\htdocs\MVC FRAMEWORK\app\models\Register.model.php