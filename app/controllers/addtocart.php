<?php
namespace app\controllers;

require_once "config/dbcon.php";
spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models" . "/" . $class . "s.model.php");

class addtocart extends \Product
{
    private $cart;
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
        ;
    }
    
    public function calculatePrice(){

    }
}
if (isset ($_GET["id"])) {
    $addItem = new addtocart();
    $addItem->addTocart($addItem->showProduct("foods", $_GET["id"]));
    $_SESSION["ITEMS"][] = $addItem->getcart();
    header("Location:/home");
}

