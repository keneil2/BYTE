<?php 
class HandlingErrors{
     public static function Errors(){
        if(!empty($_SESSION["client_side_Errors"])){
        foreach($_SESSION["client_side_Errors"] as $e){
        echo "<p class='error' style='color:red; font-weight:bold;'>$e<p>";
        }
        unset($_SESSION["client_side_Errors"]);
     }

 }
 }
 
   HandlingErrors::Errors();// class for handling errors 