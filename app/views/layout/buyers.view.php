<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["Product_id"])){
        $_SESSION["productid"]=  $_GET["Product_id"];
    }
  if(isset($_GET["delivery_type"]) && strtolower($_GET["delivery_type"])=== "shipping" && isset($_GET["submitBtn"])){
 header("Location:/checkoutProcess");
  }
  if( isset($_GET["delivery_type"]) && isset($_GET["submitBtn"]) && strtolower($_GET["delivery_type"])=== "pickup"){
    // send them to the card page
    header("Location:/checkout");
  }
    }
?>
<form action="">
    <label for="">would you like shipping ? </label><br>
    <input type="radio"  name="delivery_type"value="shipping"><br>
    OR
    <label for="">would you like Pickup ? </label><br>
    <input type="radio"  name="delivery_type"value="pickup"><br>
    <input name="submitBtn" type="submit">
</form>