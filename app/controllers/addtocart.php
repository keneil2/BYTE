<?php
namespace app\controllers;

require_once "config/dbcon.php";
spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models" . "/" . $class . "s.model.php");

class addtocart extends \Product
{
    private $cart;
    private array $price;
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
            foreach ($products as $product) {
                $total += floatval($product["price"]);
            }
        }
        return $total;
    }
}
if (isset ($_GET["id"])) {
    $addItem = new addtocart();
    $addItem->addTocart($addItem->showProduct("foods", $_GET["id"]));
    // var_dump($addItem);
    $data = [];
    $data["cart_total"] = null;
    if (isset ($_COOKIE["cart_items"])) {
        $data = unserialize($_COOKIE["cart_items"]);
    }

    $data[] = $addItem->getcart();
    if($data!==null){
    setcookie("cart_items", serialize($data), 0, "/", "localhost");
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    $_SESSION["ITEMS"][] = $addItem->getcart();
    $cartToatl=$addItem->CalculateTotalPrice($data);
    setcookie("cart_total",$cartToatl, 0, "/", "localhost");
    header("Location:/home");}
}

