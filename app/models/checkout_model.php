<?php
include_once dirname(__FILE__,3)."/config/dbcon.php";
class Checkout_model extends dbcon{
    public function getuserId($email){
      $connection=$this->Db_connection();
      $query="SELECT ID From customers WHERE Email=:E";
      $stmt=$connection->prepare($query);
      $stmt->bindParam("E",$email);
      $stmt->execute();
     return  $stmt->fetch();
    }
    public function countItemsIncart(){
        
    }

}