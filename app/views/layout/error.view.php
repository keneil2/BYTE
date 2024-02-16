<?php 
// require_once "app/../../../controllers/signup.controller.php";
// require_once "/../../../public/css/navbar.css";

class HandlingErrors{
     public static function Errors(){
      //   var_dump ($_SESSION["client_side_Errors"]);
        if(!empty($_SESSION["client_side_Errors"])){
        foreach($_SESSION["client_side_Errors"] as $e){
        echo "<p class='error' style='color:red; font-weight:bold;'>$e<p>";
        }
      //   header("Location:/signup");
      //   exit();
     }
     unset($_SESSION["client_side_Errors"]);

 }
 }
 
   HandlingErrors::Errors();// class for handling errors 