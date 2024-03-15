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
        background-color:white;
    }
    nav{
        min-height:30vh;
        /* background:rgb(255,69,0); */
        background-blend-mode:darken;
    }
  .product img{
    object-fit:fit;
   height:400px;
   width:400px;
   border-radius:15px;
  }
  .description{
    width:400px;
    font-size:0.9rem;
  }
  .product{
    /* position:absolute;
    top:200px;
    left:400px; */
    width:600px;
    height:fit-content;
    background-color:rgba(239, 239, 239,0.4);
    box-shadow: -1px -2px 2px rgba(0,0,0,0.5);
    border-radius:5px;
    padding:20px;
  }
  
  .button,.buy_now{
    color:white;
    background-color:rgb(255,69,0,0.8);
    border:none;
    padding:5px 15px;
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

