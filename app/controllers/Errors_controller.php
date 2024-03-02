<?php 
namespace app\controllers;
require_once "app/../../models/Register.model.php";
 class Error{
     public static function sanitizeInput($string){
        $sanitizedData=filter_var($string,FILTER_SANITIZE_SPECIAL_CHARS);
        return $sanitizedData;
       }
       public static function validateEmail($email){
        $valdateEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
        return $valdateEmail;
       }

    public static function logErrors($email){
        $errors=[];
        if(empty($_POST["userName"]) || empty( $_POST["Password"]) || empty($_POST["Email"])){
         $errors["input_error"]="please fill out all fields!!";
        }
        if(!empty($_POST["Email"]) && isset( $_POST["Email"])){ 
        // var_dump(\Register::isEmailExist($email));
        if(\Register::isEmailExist($email)==true){
       $errors["email_exixt_in_DB"]="email already exist <a href='/login'>Go To login Page<a>";
        }}
        if(!empty($errors)){
            $_SESSION["client_side_Errors"]=$errors; 
            header("Location:/signup");
            // var_dump($_SESSION["client_side_Errors"]); 
            echo "set";
            exit(); 
        }
     }
     public static function handleAllError($InputMETHOD,$input1,$input2){
        $errors=[];
        if(empty($InputMETHOD[$input1]) || empty( $InputMETHOD[$input2])){
            $errors["input_error"]="please fill out all fields!!";
           }
        if ($input1=="Email" || $input2=="Email"){
        // var_dump(\Register::isEmailExist($email));
        if(\Register::isEmailExist($InputMETHOD["Email"])==true){
            $errors["email_exixt_in_DB"]="email already exist <a href='/login'>Go To login Page<a>";
             }
        }
        if(!empty($errors)){
            $_SESSION["admin_category_errors"]=$errors; 
            header("Location:/new-category");
            echo "set";
            exit(); 
        }else{
            echo "not set";
        }

     }
     }

 