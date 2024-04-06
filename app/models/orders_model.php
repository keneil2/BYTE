<?php
include_once dirname(__FILE__,3)."/config/dbcon.php";
class order_model extends dbcon{
 public function order(){
    
 }
 public function selectBYId($id)
  {
    try {
      $con = $this->Db_connection();
      $query = "SELECT * FROM cart_items WHERE user_id=:id";
      $stmt = $con->prepare($query);
      $stmt->bindParam("id", $id);
      $stmt->execute();
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC) ?? 'row does not exist';
      return $result;
    } catch (\PDOException $e) {
      return false;
    }
  }
  public function updateAddress($Address){
   $con=$this->Db_connection();
   $query="UPDATE orders SET address=:a";
   $stmt=$con->prepare($query);
   $stmt->bindParam("a",$Address);
   if($stmt->execute()==false){
  // some function that log an error to the dev will work on it in right sir ? yes lol
 throw new Inputerrors("unknow error contact Admin");
   }

  }
}