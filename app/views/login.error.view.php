<?php 


if(isset($_SESSION["login_errors"])){
foreach ($_SESSION["login_errors"] as $key) {
    echo "<p class='connection_error' >".$key."</p>";
}}elseif(isset($_SESSION["conncetion_error"])){
    // header("Location:/login");
    echo "<p class='connection_error' >".$_SESSION["conncetion_error"]."</p>";
    exit();
}