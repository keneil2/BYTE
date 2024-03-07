<?php 
declare(strict_types=1);
namespace app\models;

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
      echo "connection_Error:check internet";
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
      return false;
      }
 }




 function  isEmailUnique($email){
  try{
  $con=$this->Dbcon();

  $query= "SELECT * FROM adminusers WHERE Email=:email";
  $stmt=$con->prepare($query);
  
  $stmt->bindParam("email",$email);
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
 return false;

 }}




public function authenicate(string $username,string $password){
  try{
  $con=$this->Dbcon();
  $query="SELECT * FROM adminusers WHERE USERNAME=:username";
  $stmt=$con->prepare($query);
  $stmt->bindParam("username",$username);
  $stmt->execute();
  $result= $stmt->fetch(\PDO::FETCH_ASSOC) ?? false;
  if($result==false){
    return false;
  }
  if (password_verify($password,$result["PWD"])) {
    return true;
   }else{
    return false;
   }}catch(\Exception $e){
    return false;
   }
}
public function disPlayUsers(){
  try{
  $con=$this->Dbcon();
  $query="SELECT * FROM adminusers";
  $stmt=$con->prepare($query);
  $stmt->execute();
  $result= $stmt->fetchAll(\PDO::FETCH_ASSOC) ??["no users added"];

  return $result;}catch (\Exception $e) 
  {
    return false;
  }
}
public function selectBYId($id){
  try{
  $con=$this->Dbcon();
  $query="SELECT * FROM adminusers WHERE ID=:id";
  $stmt=$con->prepare($query);
  $stmt->bindParam("id", $id);
$stmt->execute();
$result= $stmt->fetch(\PDO::FETCH_ASSOC) ?? 'row does not exist';
return $result;
  }catch(\PDOException $e){
    return false;
  }
}
 
public  function updateUser(string $username,string $email,$id){
  try{
  $con=$this->Dbcon();
  $query="UPDATE adminusers SET USERNAME=:username,EMAIL=:email WHERE ID=:id";
  $stmt=$con->prepare($query);
  $stmt->bindParam("username",$username);
  $stmt->bindParam("email",$email);
  $stmt->bindParam("id",$id);
  $stmt->execute();
  }catch(\Exception $e){
    return false;
   }
}
  public function Deleteadmin($id){
    try{
    $con=$this->Dbcon();
    $query= "DELETE FROM adminusers WHERE ID=:id";
    $stmt=$con->prepare($query);
    $stmt->bindParam("id", $id);
    $stmt->execute();
  }catch(\Exception $e){
    return false;
  }
}
public  function createCategory(string $category,string $feature){
  try{
    $con=$this->Dbcon();
    $query="INSERT INTO categories(CATEGORY_NAME,to_feature) VALUES(:Category,:Feature)";
    $stmt=$con->prepare($query);
   $stmt->bindParam("Category",$category);
   $stmt->bindParam("Feature",$feature);
   $stmt->execute();
  }catch(\Exception $e){
    echo"errors:".$e->getMessage();
  }
}
// basically checks if a field is already entered
public function Primarykey(string $tablename, $fieldname,$value){
$con=$this->Dbcon();
$query="SELECT $fieldname FROM $tablename WHERE $fieldname=:val";
$stmt=$con->prepare($query);
$stmt->bindParam("val",$value);
$stmt->execute();
$result=$stmt->fetch(\PDO::FETCH_ASSOC);
// return $result;
if($result["CATEGORY_NAME"]==$value){
  return true;
}else {
return false;
}
}
   public function insertdata(string $table,array $columnNames,array $values){
    try{
      $con=$this->Dbcon();
      $query="INSERT INTO $table(".implode(",",$columnNames).") VALUES(".trim(str_repeat("?,",count($columnNames))).")";
      $stmt=$con->prepare($query);
      
        foreach($values as $postion=>$Value){
      $stmt->bindParam($postion + 1,$Value);
    }
    $stmt->execute();

    }catch(\Exception $e){
     $_SESSION["content_db_Error"]=$e->getMessage();
   }
  }
public  function updatefieldtring ($category,string $feature){

    }
    public function deletefield(string $category){

    }
    
    }