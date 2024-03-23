
<style>
    .removeBtn{
        /* width:50px; */
        padding:2px;
        height:15px;
        color:white;
        background-color: orangered;
        font-size: 0.5rem;
        border:none;
        border-radius:2px;
    }
</style>
<?php

if (isset($_SESSION['data'])) {

    // $data = unserialize($_COOKIE["cart_items"]) ?? [];
    $count = -1;
        foreach ($_SESSION['data'] as $values) {
            // if (is_array($array)) {
                // foreach ($array as $values) {
                    $count++;
                    ?>
                    <center>
                        <div class="items"><img src="storage/<?= $values["product_image"] ?>" alt="cart-icon">
                            <p>
                                <?php echo $values["product_name"] ?>
                            </p>
                            <p>
                                <?= $values['product_price'] ?>
                            </p>
                            <!-- <form action="/addtocart"> -->
                            <button name="removeBtn" class="removeBtn" id="removeBtn" data-id=<?=$values['cart_product_id']?> >Remove</button><br>
                            <div class=cartitemQuantity > <button>-</button><p>1</p><button>+</button></div>
                            <!-- </form> -->
                            <!-- <select name="quantity" id="">
                            <option value="1"></option>
                            <option value="1"></option>
                            <option value="1"></option>
                            <option value="1"></option>
                            </select>
                        </form> -->

                        </div>
                    </center>
                <?php //}
            }
        // }
} else { ?>
    <center>
        <div class=" items"><img src="public\css\img\shopping-cart.png" alt="cart-icon">
            <p>empty cart</p>
            <div>
    </center>
<?php }
?>
<div class="input"><label for="delivery">Delivery</label> <input type="radio" name="order-type"
        class="first-radio">$10.00</div>
<div class="inputs"> <label for="Pickup" id="label2">Pickup</label><input type="radio" name="order-type" id=""> $5.00
</div>
<?php $total = isset ($_SESSION['product_price']) ?$_SESSION['product_price']: "" ?>
<p>Total:
    <?= "  $" . $total . ".00" ?>
</p>
<button class="orderBTN">Order Now</button>
<?php 
// if(isset($_GET["removeBtn"])){
//     echo "btn clicked";
//      $index=(int)$_GET["removeBtn"];
//      unset($data[0]);
//      var_dump($data);
// } ?>