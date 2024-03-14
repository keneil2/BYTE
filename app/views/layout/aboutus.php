<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/menu.css">
    <title>Document</title>
</head>
<?php require_once dirname(__FILE__,3)."/controllers/displayProduct.control.php";
?>
<body>
<section class="menuSection">
    <?php for($i=0;$i<count($result);$i++){ 
        ?>
    <div class="container">
    <div class="item">
        <img src="storage/<?php echo $result[$i]["image_path"]  ?>">
        <h3><?php echo $result[$i]["food_name"] ?></h3>
        <p><?php $result[$i]["description"]?></p>
        <p><?= $result[$i]["price"] ?><p>
            <form action="/addtocart"><button>Order Now</button></form>
    </div>
    
<?php }?>



</section>
<div class="orderSummary">
<div class="title">Order Summary</div>
<div class="cartdetails">
<div class="items"><img src="public/css/img/shopping-cart.png" alt="cart-icon"><p>your cart is empty</p></div>
<form action="/orders">
    <div class="input"><label for="delivery">Delivery</label>  <input type="radio" name="order-type" class="first-radio">$10.00</div>
     <div class="inputs">    <label for="Pickup" id="label2">Pickup</label><input type="radio" name="order-type" id="">     $5.00</div>
    <p>Total:</p>
    <button>Order Now</button>
</form>
</div>
</div>
<
</body>
</html>
