<style>
    .removeBtn {
        width: 50px;
        padding: 2px;
        height: 15px;
        color: white;
        background-color: orangered;
        font-size: 0.5rem;
        border: none;
        border-radius: 2px;
    }

    .removeBtn,
    img {
        width: 15px;
        height: 15px;
        background-color: none;
    }
</style>

<?php

if (isset($_SESSION['data'])) {

    // $data = unserialize($_COOKIE["cart_items"]) ?? [];
    $count = 0;

    foreach ($_SESSION['data'] as $values) {
        // if (is_array($array)) {
        // foreach ($array as $values) {
        $count += $values['Quantity'];
        ?>
        <center>
            <div class="items"><img src="storage/<?= $values["product_image"] ?>" alt="cart-icon">
                <p>
                    <?php echo $values["product_name"] ?>
                </p>
                <p>
                    <?= $values['product_price'] ?>
                </p>

                <button name="removeBtn" class="removeBtn" id="removeBtn" data-id=<?= $values['cart_product_id'] ?>><i
                        class="fa-solid fa-trash"></i></button><br>


                <select name="quantity" id="">
                    <option value="">
                        <?= $values['Quantity'] ?>
                    </option>
                    <?php for ($i = 0; $i <= $values['Quantity']; $i++) {
                        ?>
                        <option value=<?= $i ?>><?= $i ?></option>
                    <?php } ?>
                </select>


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
<form action="/checkoutProcess" method="POST">
    <div class="input">
        <label for="delivery" id="label1">Delivery</label> <input type="radio" name="order-type"
            class="first-radio" id="delivery" value="10.00">$10.00</div>
    <div class="inputs"> 
        <label for="Pickup" id="label2">Pickup</label><input type="radio" name="order-type" id="Pickup"
            value="5.00">$5.00
    </div>
    <?php $total = isset($_SESSION['product_price']) ? $_SESSION['product_price'] : "" ?>
    <p id="total">Total:
        <?= "  $" . $total . ".00" ?>
        <?php $_SESSION["total"]=(int)$total?>
    </p>

    <input type="text" name="userId" value=<?php echo $_SESSION['data'][0]["user_id"]; ?>>
    <input type="text" name="amountofItems" value=<?= $count ?>>
    <button class="orderBTN">Order Now</button>
</form>