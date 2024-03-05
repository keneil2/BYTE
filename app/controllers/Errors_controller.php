<?php 
namespace app\controllers;
use app\models\AdminDb;
spl_autoload_register(function ($class) {
    require_once "app/models/admin.model.php";
});
 class Error{
    
     public static function sanitizeInput($string){
        $sanitizedData=filter_var($string,FILTER_SANITIZE_SPECIAL_CHARS);
        return $sanitizedData;
       }
       public static function validateEmail($email){
        $valdateEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
        return $valdateEmail;
       }
        public static function isRequestMethod($method){
            if($_SERVER["REQUEST_METHOD"]==$method){
                return true;
            }else{
                return false;
            }
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
            //var_dump($_SESSION["client_side_Errors"]);
            echo "set";
            exit(); 
        }else{
            echo "not set";
        }
     }
     public static function handleAllError($InputMETHOD,$feilds,$tablename=null,$fieldname=null,$value=null,$URLPATH="/new-category"){
        $errors=[];
        foreach($feilds as $feild){
        if(!isset($InputMETHOD[$feild]) || empty( $InputMETHOD[$feild])){
            $errors["input_error"]="please fill out all fields!!";
           }}

           $createPrimaryKey= new AdminDb();


    if($tablename!==null && $fieldname!==null && $value!==null){
        if($createPrimaryKey->Primarykey($tablename, $fieldname,$value)){
            $errors[$fieldname."_error"]="fieldname already exist";
        }}
        if(!empty($errors)){
            $_SESSION["admin_category_errors"]=$errors; 
            header("Location:$URLPATH");
            echo "set";
            exit();
        }else{
            echo "not set";
        }

     }
     public static function logFileErrors(){
        $error=[];
        if($_FILES["pic"]["error"]!==0){
          $errorCode=(int)$_FILES["pic"]["error"];
            $error["file_error"]=match( $errorCode){
            1 =>"FILE exceeds 40mb",
            2 =>"unknow2",
            3=>"there was an error uploading please try again",
            4=>"No file was uploaded",
            5=>"unknown Error_err_CODE5 please try again",
            6=>"unknown error_CODE6 please try again",
            7=>"Error_CODE 7 please try again"
            };
       
        }
        if(!empty($error)){
            $_SESSION["file_error"]=$error;
        }
    }
     }

 