<?php
require_once "app/../config/dbcon.php";
// class for creating users 
class Register{
 // inserting data to the data base
   public static function insertData($userName,$passWord,$email,$code,$status) {
  $query="INSERT INTO customers(USERNAME,PWD,Email,verification_code,Account_status) VALUES( :userName,:pwd,:email,:code,:s)";
  $pdo=new dbcon();
  $PDO=$pdo->Db_connection();
  $stmt= $PDO->prepare($query);
  $stmt->bindParam("userName", $userName);
  $stmt->bindParam("pwd", $passWord);
  $stmt->bindParam("email", $email);
  $stmt->bindParam("code", $code);
  $stmt->bindParam("s", $status);
  $stmt->execute();
   }
   // checking if email already exist
   public static function isEmailExist($email) {
    $query= "SELECT Email FROM customers WHERE Email=:email";
    $pdo=new dbcon();
  $PDO=$pdo->Db_connection();
  $stmt= $PDO->prepare($query);
  $stmt->bindParam(":email", $email);
  $stmt->execute();
  $result=$stmt->execute();
  return $result;
   }
  }