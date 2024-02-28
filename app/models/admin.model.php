<?php 
declare(strict_types=1);
namespace app\controllers;

class AdminDb{
  private $hostname="localhost";
    private $dbName="registration_";
    private $username= "root";
    private $password= "";

   private function Dbcon(){
    try {
    $con= new \PDO("mysql:hostname=$this->hostname;Dbname=$this->dbName;", $this->username, $this->password);
    $con->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    $con->exec('USE registration_');
    return $con;
    } catch (\PDOException $e) {
      echo " connection_Error:". $e->getMessage();
      exit();
    }
}



 public function addUsers(string $username,string $email,string $password){
try{   $con=$this->Dbcon();
       $query="INSERT INTO adminusers(USERNAME,EMAIL,PWD) VALUES(:U,:E,:P)";
       $stmt=$con->prepare($query);
       $stmt->bindParam("U",$username);
       $stmt->bindParam("E",$email);
       $stmt->bindParam("P",$password);
      return $stmt->execute();
    } catch (\PDOException $e) {
        echo "ADDING USERS ERROR: ". $e->getMessage();
        exit();
      }
 }




 function  isEmailUnique($email){
  try{
  $con=$this->Dbcon();

  $query= "SELECT * FROM adminusers WHERE Email=:email";
  $stmt=$con->prepare($query);
  
  $stmt->bindParam(":email",$email);
  $stmt->execute();
  if ($stmt->rowCount()> 0){
    $stmt->closeCursor();
    $con=null;
    return true;
  }else {
    $stmt->closeCursor();
    $con=null;
    return false;
  }
}catch (\Exception $e) {
  echo "Email_check_Error:". $e->getMessage();

 }}




public function authenicate(string $username,string $password){
  $con=$this->Dbcon();
  $query="SELECT * FROM adminusers WHERE USERNAME=:username";
  $stmt=$con->prepare($query);
  $stmt->bindParam("username",$username);
  $stmt->execute();
  $result= $stmt->fetch(\PDO::FETCH_ASSOC) ?? false;
  if (password_verify($password,$result["PWD"])) {
    return true;
   }else{
    return false;
   }
}
public function disPlayUsers(){
  $con=$this->Dbcon();
  $query="SELECT * FROM adminusers";
  $stmt=$con->prepare($query);
  $stmt->execute();
  $result= $stmt->fetch(\PDO::FETCH_ASSOC) ??["no users added"];
  return $result;
}
 
public function updateUser(string $username,string $emal){
  $con=$this->Dbcon();
  $query="UPDATE ";
  }
}