<?php
if (isset($_COOKIE["cart_items"])) {
    
    $data=unserialize($_COOKIE["cart_items"])?? [];
    if($data!==[]){
    foreach ($data as $array) {
        if(is_array($array)){
        foreach ($array as $values) {

            ?>
            <center>
                <div class="items"><img src="storage/<?= $values["image_path"] ?>" alt="cart-icon">
                    <p>
                        <?php echo $values["food_name"] ?>
                    </p>
                    <p>
                        <?= $values['price'] ?>
                    </p>
                </div>
            </center>
        <?php }
    }}
} }else { ?>
    <center>
        <div class=" items"><img src="public\css\img\shopping-cart.png" alt="cart-icon">
            <p>empty cart</p>
            <div>
    </center>
<?php }
?>
<div class="input"><label for="delivery">Delivery</label> <input type="radio" name="order-type"
                            class="first-radio">$10.00</div>
                    <div class="inputs"> <label for="Pickup" id="label2">Pickup</label><input type="radio"
                            name="order-type" id=""> $5.00</div>
                            <?php $total=isset($_COOKIE['cart_total'])? $_COOKIE['cart_total'] :"" ?>
                    <p>Total:<?="  $".$total.".00"?></p>
                    <button>Order Now</button>