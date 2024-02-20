<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use ParagonIE\Certainty\RemoteFetch;
// this page handles errors and user inputs
require_once "app/../../models/Register.model.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
// this function handles errors and store them in a session to be displayed 
    function disPlayError(){
        $errors=[];
        if(empty($_POST["userName"]) || empty( $_POST["Password"]) || empty($_POST["Email"])){
         $errors["input_error"]="please fill out all fields!!";
        }
        if(!empty($_POST["Email"]) && isset( $_POST["Email"])){ 
        var_dump(Register::isEmailExist(htmlspecialchars($_POST["Email"])));
        if(Register::isEmailExist(htmlspecialchars($_POST["Email"]))==true){
       $errors["email_exixt_in_DB"]="email already exist <a href='/login'>Go To login Page<a>";
        }}
        if(!empty($errors)){
            $_SESSION["client_side_Errors"]=$errors; 
            header("Location:/signup");
            var_dump($_SESSION["client_side_Errors"]); 
            echo "set";
            exit(); 
        }
     }
     // generates verification code 
     function varificationCode(){
        $code=mt_rand(100000, 999999);
        return $code;
     }
     // this function will send the email  using a PHP lib called PHPMailer pass:rata fkpi rvhj ztdc





     function checkEmailExist($email,$code,$userName){
// calling the php object
         $mail = new PHPMailer(); 
        // not recommended for production environment basicaly unsecure connections
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];
        $mail->SMTPDebug = 0;   
         // calling the session that sends the email 
        $mail->isSMTP();
        // setting the smtp host
        $mail->Host = gethostbyname('smtp.gmail.com'); 
        // ensuring it is secure
        $mail->SMTPAuth = true; 
        // im not sure 
        $mail->SMTPSecure = "tls";
        // the port used to send the email
        $mail->Port = 587; 
        // the senders email this is where the emails are send from
        $mail->Username = 'keneilsamms85@gmail.com';
        // app password
        $mail->Password = 'mkpo pugz pqzr hdzf';
        $mail->setFrom('keneilsamms85@gmail.com');
        // the recipient
        $mail->addAddress($email);
        // subject of the email
        $mail->Subject ='Action required:verify your Email Address';
        // this is me geting the content of a file so I can use it here 
        $path=file_get_contents('app/views/var_email.php');
        // this is me using str_replace two things in a string the username and the code before sending the email to the user 
        $eamilBody=str_replace(['{userName}','{verificationCode}'],[$userName,$code],$path);
       // the body of the emial
        $mail->Body=$eamilBody;
         // telling phpmailer that the email might have html
        $mail->isHTML(true);
        // finally sending the email
        $mail->send();
        }
        disPlayError();
    try{
          // calling the function to handle errors in errors.view.php   
        // checking the input fields
    if(!empty($_POST["userName"]) && !empty($_POST["Password"]) && !empty($_POST["Email"])){
        // sanitizing the users input probably should have used filter_var()
        $userName=htmlspecialchars($_POST["userName"]);
        $email=htmlspecialchars($_POST["Email"]);
        // this is the email that I will be check in the varification controller file
        setcookie("var_email",$email,time()+3000,'/');
        ;

         // this will return the hash password
        $password=htmlspecialchars(password_hash($_POST["Password"],PASSWORD_BCRYPT));

        // varification function returns var code
        $code=varificationCode();

        // setting a cookie to store  the code not really recommend but wanted to use it as practice
        setcookie("Var_code", $code,time()+ 360,"/");

        // setting a cookie for the username to use later
        setcookie("userName", $userName,time()+ 360,"/");
        
        // calling the function that sends the email
        checkEmailExist($_POST["Email"],$code,$_POST["userName"]);

        $_SESSION["Var_Code"]=$code;// setting the session code

        // status for the email it is always false until i can change it
        $status="Inactive";

        // inserting data into the database
        Register::insertData($userName,$password,$email,$code,$status);

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