<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    spl_autoload_register(fn($class) => require_once dirname(__FILE__, 2) . "/models/" . strtolower($class) . ".php");
    require_once dirname(__FILE__,2)."/controllers/checkout.controller.php";
    $userId = 0;
    if (!isset($_SESSION["login_email"])) {
        header("Location:/login");
    }
    echo $_SESSION["login_email"];
    
    $_SESSION["userId"]=$userId;
    echo   var_dump($_SESSION["userId"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        if (isset($_POST["order-type"]) && isset($_SESSION["total"]) && $_POST["order-type"] == 10) {
            $_SESSION["totalPrice"] = $_SESSION["total"] + (int) $_POST["order-type"];
            echo $_SESSION["totalPrice"];
            echo "good lol";
        } else {
            header("Location:/home");
        }
        if (isset($_POST["order-type"]) && $_POST["order-type"] == 5) {
            header("Location:/buying");
        }}?>
       <?php if ($userId !== 0) {
            ?>
             
            <nav>
                <span class="Company_Name">BYTE</span>
                <?php if (isset($_POST["amountofItems"])) { ?>
                    <h2>checkout (
                        <?= $_POST["amountofItems"] ?> items)
                    </h2>
                <?php } ?>
                <?php
                if(isset($_SESSION["checkoutError"])){
                 echo $_SESSION["checkoutError"];
                } 
                if(isset($_SESSION["checkoutErrors"])){
       foreach($_SESSION["checkoutErrors"] as $error){
              echo $error;
       }
                }
                unset($_SESSION["checkoutError"]);
                unset($_SESSION["checkoutErrors"]);
                ?>            </nav>
            <h4>PLease Add an Address For shipping Your food</h4>
            <form action="/checkoutcontrl" method="POST">
                <input type="text" placeholder=" Full name (First and Last name)" name="name">
                <select name="parish" >
                    <option value="nothing">Select Your Parish</option>
                    <option value="Kingston">Kingston</option>
                    <option value="St.catherine">St.catherine</option>
                    <option value="St.James">St.James</option>
                    <option value="Clarendon">Clarendon</option>
                    <option value="St.Thomas">St.Thomas</option>
                    <option value="St.Elizabeth">St.Elizabeth</option>
                    <option value="Trelawny">Trelawny</option>
                    <option value="St.Andrew">St.Andrew</option>
                    <option value="St.Mary">St.Mary</option>
                    <option value="Portland">Portland</option>
                    <option value="St.Ann">St.Ann</option>
                    <option value="Westmoreland">Westmoreland</option>
                    <option value="Manchester">Manchester</option>
                    <option value="Hanover">Hanover</option>
                </select>
                <input type="text" placeholder="Street address" name="streetAddress">
                <input type="text" placeholder="City" name="city">
                <input type="text" placeholder="Phone number" name="phoneNumber">
                <input type="submit" name="submitBtn" value="add this address">
            </form>
        <?php }?>
</body>

</html>