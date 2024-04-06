<?php 
spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models/" . strtolower($class) . ".php");
require_once dirname(__FILE__, 3) . "/config/dbcon.php";
require_once dirname(__FILE__, 2) . "/models/orders_model.php";
require_once dirname(__FILE__, 2) . "/models/Products.model.php";
require_once dirname(__FILE__, 3) . "/vendor/autoload.php";
use Stripe\Stripe;
$checkoutModel = new Checkout_model;
$userId = $checkoutModel->getuserId($_SESSION["login_email"]);
$productName = new Product;
$productName->setTableName("foods");

// $userId = $checkoutModel->getuserId($_SESSION["login_email"]);

try {
    $lineitems = [];
    $getLineitems = new order_model;
    // $cartdetail=[];
    $cartdetail = $getLineitems->selectBYId($userId["ID"]);
    // $name = $productName->selectItemByID(new dbcon);
    // var_dump($name);
    foreach ($cartdetail as $item) {
        // echo $item["product_id"];
        $productName->setID($item["product_id"]);
        $quantity = $item["Quantity"];
        $price = $item["Price"];
        $name = $productName->selectItemByID(new dbcon); // Corrected variable name
        foreach($name as $productname){
        $lineitems[] = [ 
            "quantity" => $quantity,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $price * 100,
                "product_data" => [
                    "name" => $productname["food_name"]
                ]
            ]
        ];}
    }
    // var_dump($productName);

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 3), "config/.env");
    $dotenv->load();

    $stripe_api_key = $_ENV["STRIPE_API_KEY"];
    $stripe = new Stripe;
    $stripe::setApiKey($stripe_api_key);
    $stripe_charge = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost:8080/success",
        "line_items" => $lineitems
    ]);
    // echo $stripe_charge->url;
    // http_response_code(330);
    header("Location: " . $stripe_charge->url);
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
