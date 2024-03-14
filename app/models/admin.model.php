<?php
declare(strict_types=1);
namespace app\models;

class AdminDb
{
  private $hostname = "localhost";
  private $dbName = "registration_";
  private $username = "root";
  private $password = "";
  private $tablename;
  private array $columnNames;
  private function Dbcon()
  {
    try {
      $con = new \PDO("mysql:hostname=$this->hostname;Dbname=$this->dbName;", $this->username, $this->password);
      $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $con->exec('USE registration_');
      return $con;
    } catch (\PDOException $e) {
      echo "connection_Error:check internet";
      exit();
    }
  }



  public function addUsers(string $username, string $email, string $password)
  {
    try {
      $con = $this->Dbcon();
      $query = "INSERT INTO adminusers(USERNAME,EMAIL,PWD) VALUES(:U,:E,:P)";
      $stmt = $con->prepare($query);
      $stmt->bindParam("U", $username);
      $stmt->bindParam("E", $email);
      $stmt->bindParam("P", $password);
      return $stmt->execute();
    } catch (\PDOException $e) {
      return false;
    }
  }




  function isEmailUnique($email)
  {
    try {
      $con = $this->Dbcon();

      $query = "SELECT * FROM adminusers WHERE Email=:email";
      $stmt = $con->prepare($query);

      $stmt->bindParam("email", $email);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        $stmt->closeCursor();
        $con = null;
        return true;
      } else {
        $stmt->closeCursor();
        $con = null;
        return false;
      }
    } catch (\Exception $e) {
      return false;

    }
  }




  public function authenicate(string $username, string $password)
  {
    try {
      $con = $this->Dbcon();
      $query = "SELECT * FROM adminusers WHERE USERNAME=:username";
      $stmt = $con->prepare($query);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $result = $stmt->fetch(\PDO::FETCH_ASSOC) ?? false;
      if ($result == false) {
        return false;
      }
      if (password_verify($password, $result["PWD"])) {
        return true;
      } else {
        return false;
      }
    } catch (\Exception $e) {
      return false;
    }
  }
  public function disPlayUsers($table="adminusers")
  {
    try {
      $con = $this->Dbcon();
      $query = "SELECT * FROM $table";
      $stmt = $con->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC) ?? ["no users added"];

      return $result;
    } catch (\Exception $e) {
      return false;
    }
  }
  public function selectBYId($id,$table="adminusers")
  {
    try {
      $con = $this->Dbcon();
      $query = "SELECT * FROM $table WHERE ID=:id";
      $stmt = $con->prepare($query);
      $stmt->bindParam("id", $id);
      $stmt->execute();
      $result = $stmt->fetch(\PDO::FETCH_ASSOC) ?? 'row does not exist';
      return $result;
    } catch (\PDOException $e) {
      return false;
    }
  }

  public function updateUser(string $username, string $email, $id)
  {
    try {
      $con = $this->Dbcon();
      $query = "UPDATE adminusers SET USERNAME=:username,EMAIL=:email WHERE ID=:id";
      $stmt = $con->prepare($query);
      $stmt->bindParam("username", $username);
      $stmt->bindParam("email", $email);
      $stmt->bindParam("id", $id);
      $stmt->execute();
    } catch (\Exception $e) {
      return false;
    }
  }
  public function Deleteadmin($id,$table="adminusers")
  {
    try {
      $con = $this->Dbcon();
      $query = "DELETE FROM $table WHERE ID=:id";
      $stmt = $con->prepare($query);
      $stmt->bindParam("id", $id);
      $stmt->execute();
    } catch (\Exception $e) {
      return true;
    }
  }
  public function createCategory(string $category, string $feature)
  {
    try {
      $con = $this->Dbcon();
      $query = "INSERT INTO categories(CATEGORY_NAME,to_feature) VALUES(:Category,:Feature)";
      $stmt = $con->prepare($query);
      $stmt->bindParam("Category", $category);
      $stmt->bindParam("Feature", $feature);
      $stmt->execute();
    } catch (\Exception $e) {
      echo "errors:" . $e->getMessage();
    }
  }
  // basically checks if a field is already entered
  public function Primarykey(string $tablename, $fieldname, $value)
  {
    $con = $this->Dbcon();
    $query = "SELECT $fieldname FROM $tablename WHERE $fieldname=:val";
    $stmt = $con->prepare($query);
    $stmt->bindParam("val", $value);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    // return $result;
    if(is_bool($result)){
     return false;
    }
    if ($result["CATEGORY_NAME"] !== $value) {
      return false;
    } else {
      return true;
    }
  }
  public function setTablename($name)
  {
    $this->tablename = $name;
  }
  public function setColumns(array $names)
  {
    $this->columnNames = $names;
  }
  public function insertdata(array $values)
  {
    try {
      $con = $this->Dbcon();
      $query = "INSERT INTO $this->tablename (" . implode(",", $this->columnNames) . ") VALUES (" . trim(str_repeat("?,", count($this->columnNames)), ',') . ")";
      $stmt = $con->prepare($query);
      foreach ($values as $postion => $Value) {
        $stmt->bindValue($postion + 1, $Value);
      }
      $stmt->execute();

    } catch (\Exception $e) {
      $_SESSION["content_db_Error"] = $e->getMessage();
    }
  }
  public function DbTableValues(){
    $con = $this->Dbcon();
    $query="SELECT * FROM $this->tablename";
    $stmt=$con->query($query);
    if($stmt){
    $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $rows;
    }else{
      return false;
    }
  }
  public function updatefieldstring($ID,array $values){

    $con=$this->Dbcon();
    $setParts="";
    foreach($this->columnNames as $col){
      $setParts.=$col."=:$col".", ";
    }
    var_dump($setParts);
    $query="UPDATE $this->tablename SET ".rtrim($setParts,", ")." WHERE ID=:id";
    echo $query;
    $stmt=$con->prepare($query);
    $i=1;
    foreach ($values as $col => $Value) {
      foreach($this->columnNames as $col){
        $stmt->bindValue("$col", $Value);
      }
    }
  $stmt->bindParam("id",$ID);
  $stmt->execute();
}
  public function deletefield(string $category)
  {

  }

}