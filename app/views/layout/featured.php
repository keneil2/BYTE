<link rel="stylesheet" href="../../../public/css/menu.css">

<?php
require_once dirname(__FILE__, 3) . "/controllers/displayProduct.control.php";
?>
<style>
    .status{
    background-color:red;
    color:white;
    /* font-weight:500; */
    padding:2px 0px;
    width:150px;
    /* min-height:100px; */
    border-radius:5px;
    }
    .status_info{
        background-color:darkgoldenrod;
    color:white;
    padding:2px 0px;
    border-radius:5px;
    }
    .quantity{
        display:flex;
        justify-content: center;
    }
    #number {
        margin:0px 10px;
    }
</style>
<div class="container">
    <section class="menuSection">

        <?php for ($i = 0; $i < count($result); $i++) {
            ?>
            <div class="item">
                <center><img src="storage/<?php echo $result[$i]["image_path"] ?>">
                    <form action="/Food_Items"><input type="hidden" name="Product_id" value=<?= $result[$i]["ID"] ?>>
                        <h3><button class="food-item" name="cartBtn">
                                <?= $result[$i]["food_name"] ?>
                            </button></h3>
                    </form>
                    <?php if ($result[$i]["quantity"] < 2) { ?>
                        <div class="stock_status">
                            <small class="status">not prepared yet</small>
                            <!-- <small class="status_info">time to prepare: 30 minutes </small> -->
                        </div>
                    <?php } ?>
                         <div class="quantity" id="quantity"><button class=increaseBtn>+</button><p id="number">1</p><button class=decreaseBtn>-</button>
                         <div id="feedback"></div>
                         <input type="hidden"  id="availableQuantity" data-quantity=<?=$result[$i]["quantity"]?>>
                        </div>
                    <p class="price">
                        <?= "$" . $result[$i]["price"] ?>
                    <p>
                    <!-- <form action="/addtocart" method='GET'> -->
                       
                        <input type="hidden" name="Product_id" class="price" data-price=<?=$result[$i]["price"]?>>
                        <button data-id=<?= $result[$i]['ID'] ?> class="Addbutton" id="addtocart">Add to cart</button>
                    <!-- </form> -->

                    <form action=""><input type="hidden" class="p_id" name="Product_id" id="Product_id"
                            value=<?= $result[$i]["ID"] ?>><button class="buy_now">Buy now</button></form>
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
                <div class="inputs"> <label for="Pickup" id="label2">Pickup</label><input type="radio" name="order-type"
                        id=""> $5.00</div>
                <p>Total:</p>
                <button class="orderBTN">Order Now</button>
            </form>
        </div>
    </div>
</div>


</html>