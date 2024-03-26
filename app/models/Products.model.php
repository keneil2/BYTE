<?php
require_once dirname(__FILE__, 3) . "/config/dbcon.php";
class Product
{
       private $id;
       private $tableName;
       public function GetProducts(dbcon $con)
       {

              $connection = $con->Db_connection();
              $query = "SELECT foods.*, categories.CATEGORY_NAME AS category_name 
        FROM foods INNER JOIN categories ON  categories.ID=foods.category_id
        WHERE categories.to_feature= 'yes'";
              $stmt = $connection->prepare($query);
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $result;

       }
       public function displayProducts(dbcon $con)
       {
              $connnection = $con->Db_connection();
              $query = "SELECT foods.*, categories.CATEGORY_NAME AS category_name 
              FROM foods INNER JOIN categories ON  categories.ID=foods.category_id";
              $stmt = $connnection->query($query);
              // $stmt->execute();
              $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
              return $results;
              // $connnection->execute();

       }
       public function setID($id)
       {
              $this->id = $id;
       }
       public function setTableName($tableName)
       {
              $this->tableName = $tableName;
       }
       public function selectItemByID(dbcon $databaseCon,$columnName="ID")
       {
              if (isset ($this->id) && isset ($this->tableName)) {
                     $con = $databaseCon->Db_connection();
                     $query = "SELECT * FROM $this->tableName WHERE $columnName=:id";
                     $stmt = $con->prepare($query);
                     $stmt->bindParam("id", $this->id);
                     $stmt->execute();
                     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     return $result;
              } else {
                     throw new Exception("id or tablename not provided");
              }
       }


}