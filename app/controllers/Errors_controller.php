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
    //logs errors to in session
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
     public static function handleAllError($InputMETHOD,array|string $feilds,$tablename=null,$fieldname=null,$value=null,$URLPATH="/new-category"){
        $errors=[];
        foreach($feilds as $feild){
        if( empty($InputMETHOD[$feild]) || !isset($InputMETHOD[$feild])){
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
                1 => "FILE exceeds 40mb",
                2 => "Unknown Error 2",
                3 => "There was an error uploading. Please try again.",
                4 => "No file was uploaded.",
                5 => "Unknown Error_err_CODE5. Please try again.",
                6 => "Unknown error_CODE6. Please try again.",
                7 => "Error_CODE 7. Please try again."
            };
       
        }
        if(!empty($error)){
            $_SESSION["file_error"]=$error;
            header("Location:/create_Content");
        }
    }
    // this is used to send errors displayed on the page to a text file;
    public function Logerror(){

    }
     }

 