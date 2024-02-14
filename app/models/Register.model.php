<?php
require_once "app/../config/dbcon.php";
// class for creating users 
class Register{
//     public string $userName;
//     public string $passWord;
//     public string $email;
//    public function __construct($userName,$passWord,$email) {
//     $this->email = $email;
//     $this->passWord = $passWord;
//     $this->userName = $userName;
//    }
 // inserting data to the data base
   public static function insertData($userName,$passWord,$email) {
  $query="INSERT INTO customers(USERNAME,PWD,Email) VALUES( :userName,:pwd,:email)";
  $pdo=new dbcon();
  $PDO=$pdo->Db_connection();
  $stmt= $PDO->prepare($query);
  $stmt->bindParam("userName", $userName);
  $stmt->bindParam("pwd", $passWord);
  $stmt->bindParam("email", $email);
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