<?php


require_once "app\controllers\Errors_controller.php";
use app\controllers\Error;
require_once dirname(__FILE__,3)."/config/dbcon.php";

class checkoutProcess extends Error
{
    private string $tablename = "orders";
    private array $columnNames;
    public function checkPhoneNumber($phonenumber)
    {
        if (!preg_match("/[876]{1}[0-9]{7}/", $phonenumber)) {
            throw new Exception("please Enter a valid number that match 876 followed by excatly 7 digits");
        }
    }
    public function setcols(array $cols)
    {
        $this->columnNames = $cols;
    }

    public function insertdata(\dbcon $db, array $values)
    {
        try {
            $con = $db->Db_connection();
            $query = "INSERT INTO $this->tablename (" . implode(",", $this->columnNames) . ") VALUES (" . trim(str_repeat("?,", count($this->columnNames)), ',') . ")";
            $stmt = $con->prepare($query);
            foreach ($values as $postion => $Value) {
                $stmt->bindValue($postion + 1, $Value);
            }
            $stmt->execute();

        } catch (\Exception $e) {
         throw new Exception($e->getMessage());
        }
    }
   public function isuserUnique($name,\dbcon $db,$userId){
    $con=$db->Db_connection();
    $query="SELECT * From orders where user_id=$userId";
    $res=$con->query($query);
    if($res->rowCount()>=1){
        throw new Exception("you address already exist in our records");
    }

 }

}
try {


    $checkout = new checkoutProcess;
    if ($checkout->isRequestMethod("POST") && isset($_POST["submitBtn"])) {
        $name = $checkout->sanitizeInput($_POST["name"]);
        $Parish = $checkout->sanitizeInput($_POST["Parish"]);
        $streetAddress = $checkout->sanitizeInput($_POST["streetAddress"]);
        $City = $checkout->sanitizeInput($_POST["city"]);
        $phoneNumber = $checkout->sanitizeInput($_POST["phoneNumber"]);
        // handling most clientside errors 
        $checkout->handleAllError($_POST,["name","parish","streetAddress","city","phoneNumber"],URLPATH:"/checkoutProcess",errorName:"checkoutErrors");
        $checkout->isuserUnique($name,new dbcon,$_SESSION["userId"]["ID"]);
        // adding info to db
        $checkout->setcols(["user_id", "name", "address", "phone_number"]);
        $checkout->insertdata(new dbcon, [$_SESSION["userId"]["ID"], $name, $Parish . "\n" . $streetAddress . "\n" . $City, $phoneNumber]);
        header("Location:/orderPage");
    }
} catch (Exception $e) {
    $_SESSION["checkoutError"] = $e->getMessage();
    header("Location:/checkoutProcess");
}