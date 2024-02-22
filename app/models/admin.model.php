<?php 
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
      return $stmt->execute();} catch (\PDOException $e) {
        echo "ADDING USERS ERROR: ". $e->getMessage();
        exit();
      }
 }
}