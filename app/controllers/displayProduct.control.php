<?php
require_once dirname(__FILE__,2)."/models/Products.model.php";
require_once dirname(__FILE__,3)."/config/dbcon.php";
$product= new Product();
echo"<pre>";
$result=$product->GetProducts(new Dbcon);
// var_dump($result);
// foreach($result as $result){

// }
echo"</pre>";