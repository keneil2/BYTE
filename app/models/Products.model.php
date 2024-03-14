<?php
require_once dirname(__FILE__,3)."/config/dbcon.php";
class Product{
       public function GetProducts(dbcon $con){
        
        $connection=$con->Db_connection();
        $query="SELECT foods.*, categories.CATEGORY_NAME AS category_name 
        FROM foods INNER JOIN categories ON  categories.ID=foods.category_id
        WHERE categories.to_feature= 'yes'";
        $stmt=$connection->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

       }
       public function displayProducts(dbcon $con){
              $connnection=$con->Db_connection();
              $query="SELECT foods.*, categories.CATEGORY_NAME AS category_name 
              FROM foods INNER JOIN categories ON  categories.ID=foods.category_id";
              $stmt=$connnection->query($query);
              // $stmt->execute();
              $results=$stmt->fetchALL(PDO::FETCH_ASSOC);
              return $results;
              // $connnection->execute();

       }
       
}