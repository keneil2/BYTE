<?php
namespace app\controllers;

require_once "config/dbcon.php";
spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models" . "/" . $class . "s.model.php");

class addtocart extends \Product
{
    private $cart;
    private $price;
    public function showProduct($tableName, $id)
    {
        $product = new \Product;
        $product->setTableName($tableName);
        $product->setID($id);
        return $product;
    }
    public function getcart()
    {
        return $this->cart;
    }
    public function addTocart(\Product $product)
    {

        $this->cart = $product->selectItemByID(new \dbcon);


    }
    public function CalculateTotalPrice($items)
    {
        $total = 0;
        foreach ($items as $products) {
            if ($products !== null) {
            foreach ($products as $product) {
                
                    $total += floatval($product["price"]);
                }

            }
        }
        return $total;
    }
    public function removeItem($items,$index){
        if(isset($_GET["removeBtn"])){
            if(isset ($items)&& isset($index)){
                unset($items[$index]);
                  }   
        }
     
    }
}
if (isset ($_GET["id"])) {
    $addItem = new addtocart();
    $addItem->addTocart($addItem->showProduct("foods", $_GET["id"]));
    $addItem->getcart();



    // $data["cart_total"] = null;
    if (isset ($_COOKIE["cart_items"])) {
        $cartToatl = $addItem->CalculateTotalPrice(unserialize($_COOKIE["cart_items"]));
        setcookie("cart_total", $cartToatl, 0, "/", "localhost");
    }
    $data=isset($_COOKIE["cart_items"]) ? unserialize($_COOKIE["cart_items"]):[];
    $data[]= $addItem->getcart();
    setcookie("cart_items", serialize($data), 0, "/", "localhost");
        require_once "app/views/layout/cartitems.php"; 
}
$removeItem= new addtocart();
$removeItem->removeItem(unserialize($_COOKIE),$_GET["removeBtn"]);