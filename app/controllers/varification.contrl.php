<?php 
// handles user varification code
namespace varEmail;
use PHPMailer\PHPMailer\PHPMailer;
use ParagonIE\Certainty\RemoteFetch;
class Varification_controller{
    public static  function varificationCode(){
        $code=mt_rand(100000, 999999);
        return $code;
     }
   public static function checkEmailExist($email,$code,$userName){
        // calling the php object
                 $mail = new PHPMailer(); 
                // not recommended for production environment basicaly signing my own cert since the sever one wont get varified :/
                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ]
                ];
                $mail->SMTPDebug = 0;   
                 // calling the method that sends the email 
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
                $path=file_get_contents('app/views/layout//var_email.php');
                // this is me using str_replace two things in a string the username and the code before sending the email to the user 
                $eamilBody=str_replace(['{userName}','{verificationCode}'],[$userName,$code],$path);
               // the body of the emial
                $mail->Body=$eamilBody;
                 // telling phpmailer that the email might have html
                $mail->isHTML(true);
                // finally sending the email
                $mail->send();
                }
}
