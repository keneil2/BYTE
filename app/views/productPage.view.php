<?php
use app\controllers\Error;
use app\models\AdminDb;
require_once "layout/navbar.view.php";
require_once dirname(__FILE__,2)."/models/admin.model.php"; 
require_once dirname(__FILE__,2)."/controllers/Errors_controller.php"; 
if(Error::isRequestMethod("GET")){
 $product=new AdminDb;
 $id=Error::sanitizeInput($_GET["Product_id"]);
 echo $id;
 $result=$product->selectBYId($id,"foods");
//  var_dump($result);
}?>
<style>
    *{
        box-sizing: border-box;
    }
    body{
        background-color:rgb(239, 239, 239)
    }
    nav{
        min-height:50vh;
    }
  .product img{
   height:400px;
   width:400px;
   border-radius:15px;
  }
  .description{
    width:400px;
    font-size:0.9rem;
  }
  .product{
    width:600px;
    height:fit-content;
    background-color: white;
    box-shadow: -1px -2px 2px rgba(0,0,0,0.7);
    border-radius:5px;
    padding:20px;
  }
  
  .button,.buy_now{
    color:white;
    background-color:rgb(255,69,0,0.8);
    border:none;
    padding:15px;
    border-radius: 5px;
  }
</style>
<center>
<div class="product" >
<center><img src="storage/<?php echo $result["image_path"]  ?>">
        <form action="/Food_Items"><h4><?= $result["food_name"] ?></h4></form>
        <h4>Decription</h4>
        <p class="description"><?= $result["description"]?><p>
            <p>price</p>
        <p class="price"> <?= "$".$result["price"]?><p>
            <form action="/addtocart"><button class="button">Add to cart</button></form>
            <form action="/addtocart"><button class="buy_now" >Buy now</button></form>
        </center>
    </div>
    </center>

