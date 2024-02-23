<?php
require_once "../models/admin.model.php";
use app\controllers\AdminDb;
require_once "../../config/session.php";
Session::Sstart();

function Sanitizeinput($input){
          if(!empty($input)){
         $filterInput=filter_var($input,FILTER_SANITIZE_STRING);
         return $filterInput;
}else{
    return false;
}}
 
function validateEmail($email){
    if(!empty($email)){
        $filterEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
        return $filterEmail;
    }else{
        return false;
    }
}
function validateUsername($username){
if (!empty($username)){
    $filterUsername=filter_var($username,FILTER_SANITIZE_STRING);
    if (preg_match("/([A-Za-z][0-9]+){10}/", $filterUsername)){
        return true;
    }else{
        return false;
    }
}
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $Messages=[];
    $userName= Sanitizeinput($_POST["userName"]);
    $Email= validateEmail($_POST["Email"]);
    $Pwd= Sanitizeinput($_POST["Pwd"]);


if ($userName==false && $Email==false && $Pwd==false){
        $Messages["errors"]=" cannot submit empty fields";
       }else if (  $Pwd!==$_POST['retypedPwd']){
        $Messages['password_check']= 'passwords dont match';
       }elseif( validateUsername($_POST["userName"])==false){
           $Messages["username_errors"]="user name must be 10 chars long and contains at least one number";
       }


       if (!empty($Messages)){
        $_SESSION["feedBack"]=$Messages;
        header("Location:/new-admin");
        exit;
       }



    try{
          $admin= new AdminDb();
          $results=$admin->addUsers($userName,$Email,password_hash($Pwd,PASSWORD_BCRYPT));

        
          if($results){
            $_SESSION["user"]= "Added succefully!!";
            header("Location:/new-admin");
          }else{
           throw new Exception("USER NOT ADDED CHECK CONNECTION");
          }

    }catch (Exception $e){
            echo $e->getMessage();
        }

      

   }