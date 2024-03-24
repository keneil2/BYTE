<?php
namespace app\controllers;

use app\models\AdminDb;

require_once "config/dbcon.php";
require_once dirname(__FILE__, 2) . "/models/admin.model.php";
spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models" . "/" . $class . "s.model.php");
setcookie("userId", $_SESSION["login_email"], 0, "/", "localhost", true, true);
class Cart_controller extends \Product
{
    private $cart;
    private $price;
    private $productId;
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
    public function addTocart(AdminDb $adminDb, array $values)
    {
        $adminDb->setTablename("cart_items");
        $adminDb->setColumns(['product_id', 'user_id', 'Quantity', 'Price']);
        $adminDb->insertdata($values);


    }
    public function updateProductQuantity($newQuantity, $productId)
    {
        $connection = new \dbcon;
        $conresults = $connection->Db_connection();
        $query = "UPDATE cart_items SET Quantity=:newamount WHERE product_id=:id";
        $stmt = $conresults->prepare($query);
        $stmt->bindParam("newamount", $newQuantity);
        $stmt->bindParam("id", $productId["ID"]);
        $stmt->execute();
        // require_once dirname(__FILE__, 2) . "/views/layout/cartitems.php";
        // exit();
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
    public static function getId(\dbcon $con)
    {
        $dbconnection = $con->Db_connection();
        $query = "SELECT ID FROM customers WHERE Email=:email";
        $stmt = $dbconnection->prepare($query);
        $stmt->bindParam("email", $_SESSION["login_email"]);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }
    public function displaycartItems(\dbcon $con, $id)
    {
        $connnection = $con->Db_connection();
        $query = "SELECT cart_items.*, foods.food_name AS product_name,
           foods.price AS product_price, foods.image_path AS product_image
           FROM cart_items INNER JOIN foods ON  foods.ID=product_id
           WHERE cart_items.user_id=" . $id["ID"];
        $stmt = $connnection->query($query);
        $stmt->execute();
        $results = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        $this->cart = $results;
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->cart as $products) {
            $totalPrice += $products['product_price'];
        }
        return $totalPrice;
    }
    public function removeFromCart(\dbcon $con, $id)
    {
        if (isset ($id)) {

            $dbconnection = $con->Db_connection();
            $query = "DELETE FROM cart_items WHERE cart_product_id=:id";
            $stmt = $dbconnection->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->execute();
        }
    }

}

// adding Items to cart
if (isset ($_GET["Product_id"]) && isset ($_GET["quanity"]) && isset ($_GET["price"])) {
    $_SESSION["productsIds"][] = $_GET["Product_id"];
    var_dump($_SESSION["productsIds"]);
    $hashMap = [];
    foreach ($_SESSION["productsIds"] as $ids) {
        if (isset ($hashMap[$ids])) {
            $hashMap[$ids]++;
            if ($hashMap[$ids] == 2) {
                $_GET["quanity"]++;
            }
        } else {
            $hashMap[$ids] = 0;
        }

    }
    foreach ($hashMap as $productid => $quantity) {
        if ($quantity > 1) {
            echo $_GET["quanity"];
            $addItem = new Cart_controller();
            $userId = $addItem::getId(new \dbcon);
            $addItem->updateProductQuantity($_GET["quanity"], ["ID"=>$productid]);
        }else{
            $addItem = new Cart_controller();
            $userId = $addItem::getId(new \dbcon);
            $addItem->addTocart(new AdminDb, [$_GET["Product_id"], $userId["ID"], $_GET["quanity"], $_GET["price"]]);
            $addItem->displaycartItems(new \dbcon, $userId);
            $_SESSION['data'] = $addItem->getcart();
            $_SESSION['product_price'] = $addItem->getTotalPrice();
        }
    }



       
}


// removing Items from cart
$addItem = new Cart_controller();
if (isset ($_GET['cart_id'])) {
    $addItem->removeFromCart(new \dbcon, $_GET['cart_id']);
    echo $_GET['cart_id'];
    $userId = $addItem::getId(new \dbcon);

    $addItem->displaycartItems(new \dbcon, $userId);
    $_SESSION['data'] = $addItem->getcart();
    $_SESSION['product_price'] = $addItem->getTotalPrice();
}
require_once dirname(__FILE__, 2) . "/views/layout/cartitems.php";
























// $data["cart_total"] = null;
//     if (isset ($_COOKIE["cart_items"]) ) {
//         $cartToatl = $addItem->CalculateTotalPrice(unserialize($_COOKIE["cart_items"]));
//         setcookie("cart_total", $cartToatl, 0, "/", "localhost");
//     }
//     $data=isset($_COOKIE["cart_items"]) ? unserialize($_COOKIE["cart_items"]):[];
//     $data[]= $addItem->getcart();
//     setcookie("cart_items", serialize($data), 0, "/", "localhost");
//         require_once "app/views/layout/cartitems.php"; 
// }
// $removeItem= new addtocart();
//  $removeItem->removeItem(unserialize($_COOKIE["cart_items"]),$_GET["removeBtn"]);
// echo "<pre>";
// $_COOKIE["cart_items"]=serialize($_COOKIE["cart_items"]);
// echo "</pre>";