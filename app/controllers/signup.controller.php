<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use ParagonIE\Certainty\RemoteFetch;

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
     // generates verification code 
     function varificationCode($email){
        $timestamp=time();
        $string=$email.$timestamp;
        $code=hash("sha256", $string);
        return $code;
     }
     // this function will send the email pass:rata fkpi rvhj ztdc
     function checkEmailExist($email,$code,$userName){
        
        $mail = new PHPMailer();
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];
        $mail->SMTPDebug = 0;   
        $mail->isSMTP();
        $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Username = 'keneilsamms85@gmail.com';
        $mail->Password = 'mkpo pugz pqzr hdzf';
        $mail->setFrom('keneilsamms85@gmail.com');
        $mail->addAddress($email);
        $mail->Subject ='Action required:verify your Email Address';
        $path=file_get_contents('app/views/var_email.php');
        $eamilBody=str_replace(['{userName}','{verificationCode}'],[$userName,$code],$path);

        $mail->Body=$eamilBody;
        // $_SESSION['E']= $mail->Body;
        $mail->isHTML(true);
        if ($mail->send()){
            $_SESSION["email_status"]=="email sent";
            echo  $_SESSION["email_status"];}
            else{
                $_SESSION["email_status"]= "Not sent";
                echo $_SESSION["email_status"];
            }
        }
        
     

     // calling the function to handle errors in errors.view.php   
     disPlayError();
    try{
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
        $userName=htmlspecialchars($_POST["userName"]);
        $email=htmlspecialchars($_POST["Email"]);
        $password=htmlspecialchars(password_hash($_POST["Password"],PASSWORD_BCRYPT));
        $code=varificationCode($_POST["Email"]);// this will return the hash password
        setcookie("Var_code", $code,time()+ 360);
        
        checkEmailExist($_POST["Email"],$code,$_POST["userName"]);

        $_SESSION["Var_Code"]=$code;
        $status="false";// status for the email it is always false until i can change it
        Register::insertData($userName,$password,$email,$code,$status);
        // header("Location:/Email_varification");//sending the user to a var page to varify email
        exit("scrpit");
    }else{
        header("Location:/signup");
    }
}catch (Exception $e){
    header("Location:/signup");
    exit("Error: ".$e->getMessage());
}
}