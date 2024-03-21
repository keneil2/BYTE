
    <link rel="stylesheet" href="../../../public/css/menu.css">

    <?php
    require_once dirname(__FILE__, 3) . "/controllers/displayProduct.control.php";
    ?>
    <div class="container">
        <section class="menuSection">

            <?php for ($i = 0; $i < count($result); $i++) {
                ?>
                <div class="item">
                    <center><img src="storage/<?php echo $result[$i]["image_path"] ?>">
                        <form action="/Food_Items"><input type="hidden" name="Product_id" value=<?= $result[$i]["ID"] ?>>
                            <h3><button class="food-item">
                                    <?= $result[$i]["food_name"] ?>
                                </button></h3>
                        </form>
                        <p class="price">
                            <?="$" . $result[$i]["price"]?>
                        <p>
                        <input type="hidden" name="Product_id" id="product_id" value=<?= $result[$i]["ID"] ?>>
                        <button data-id=<?= $result[$i]['ID'] ?>
                                class="Addbutton"  id="addtocart">
                                Add to cart</button>
                        <form action=""><input type="hidden" class="p_id" name="Product_id" id="Product_id" value=<?= $result[$i]["ID"] ?>><button
                                class="buy_now">Buy now</button></form>
                    </center>
                </div>
                <?php
            }
            ?>

        </section>
        <div class="orderSummary" id="ordersummary">
            <div class="title">Order Summary</div>
            <div class="cartdetails" id="cartDetails">
                <form action="/orders">
                    <div class="input"><label for="delivery">Delivery</label> <input type="radio" name="order-type"
                            class="first-radio">$10.00</div>
                    <div class="inputs"> <label for="Pickup" id="label2">Pickup</label><input type="radio"
                            name="order-type" id=""> $5.00</div>
                    <p>Total:</p>
                    <button class="removeBtn" >Order Now</button>
                </form>
            </div>
        </div>
    </div>
    <script src="cart.js"></script>
</body>

</html>
