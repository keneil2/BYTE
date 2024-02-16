<?php 
require_once "../../config/dbcon.php";
// this class handles any that is related to the login page
class Login_model{
public static function canLogin($email,$passWord) {
    $query= "SELECT Email,PWD FROM customers WHERE  Email=:E";
    $pdo=new dbcon();
  $PDO=$pdo->Db_connection();
  $stmt=$PDO->prepare($query);
  $stmt->bindParam("E", $email);
  $stmt->execute();
  $results=$stmt->fetch(PDO::FETCH_ASSOC);
  if($results){
   if(password_verify($passWord,$results["PWD"])){
    return true;
  
    }}else {
        return false;
    }
}}