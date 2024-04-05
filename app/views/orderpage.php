<?php require_once dirname(__FILE__, 2) . "/models/orders_model.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordepage</title>
</head>

<body><?php    $getuserAddress = new order_model;
    $results = $getuserAddress->selectBYId($_SESSION["userId"]["ID"]);
    var_dump($results);
    ?>
<form action="/order-controller" method="POST">
    <textarea name="address" id="" cols="30" rows="10"><?=$results["address"]?> </textarea>
    <input type="submit" name="upadteAdress">
</form>
    <?php if (isset($_SESSION["order_errors"])) {
        foreach ($_SESSION["order_errors"] as $error) { ?>
            <p>
                <?= $error ?>
            </p>
        <?php }

    }
    unset($_SESSION["order_errors"]);
 
    ?>  
    
    <form action="/order-controller" method="POST">>
        <input type="text" placeholder="Cardholder's Name" name="name"><br>
        <input type="text" placeholder="please enter card details" name="cardNum"><br>
        <label for="expdate"> please Enter the Expiration date</label> <input type="date" name="date"><br>
        <input type="text" placeholder="please enter your CVC" name="CVC"><br>
        <!-- <input type="text" placeholder="please enter card details"><br> -->
        <input type="submit" name="submitcardBtn">

    </form>


</body>

</html>