<?php 
spl_autoload_register(function ($class) {
if (file_exists("../../config/dbcon.php")){
    require_once "../../config/dbcon.php";
}else{
    require_once "config/dbcon.php";
}
});
// this class handles any that is related to the login page
class Login_model{
public static function canLogin($email,$passWord,$username) {
    try{
    $query= "SELECT Email,PWD FROM customers WHERE  Email=:E AND USERNAME=:U";
    $pdo=new dbcon();
  $PDO=$pdo->Db_connection();
  $stmt=$PDO->prepare($query);
  $stmt->bindParam("E", $email);
  $stmt->bindParam("U", $username);
  $stmt->execute();
  $results=$stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  $PDO=null;
  if($results){
   if(password_verify($passWord,$results["PWD"])){
    return true;
    }else {
        return false;
    }}
}catch(PDOException $e) {
    return "error:". $e->getMessage();
}
}

public static function  checkAcStatus($email){
    $con=new dbcon();
    $PDO=$con->Db_connection();
    $query="SELECT Account_status FROM customers WHERE Email=:email";
    $stmt= $PDO->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $status = $stmt->fetch(PDO::FETCH_ASSOC);

//this is used to close the connection
$stmt->closeCursor(); 
$PDO = null;
     var_dump($status["Account_status"]);
}
public static function accountStatus(){
    $con=new dbcon();
    $PDO=$con->Db_connection();
    $query="UPDATE customers SET Account_status='Active' WHERE Email=:email";
    $result= $PDO->prepare($query);
    $result->bindParam("email",$_COOKIE["var_email"]);
    $result->execute();
}
}