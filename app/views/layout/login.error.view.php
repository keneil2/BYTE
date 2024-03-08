<?php
// this page displayes the login the errrors to the login page
if(isset($_SESSION["login_errors"])){

// displayed each error
foreach ($_SESSION["login_errors"] as $key) {
    echo "<p class='connection_error' >".$key."</p>";

// destroying the sesession once we are done with it
    unset($_SESSION["login_errors"]);

}}else if(isset($_SESSION["conncetion_error"])){
   // this display errors if we cant conncet to the data base
    echo "<p class='connection_error' >".$_SESSION["conncetion_error"]."</p>";
    unset($_SESSION["conncetion_error"]);
    exit();
}



if (isset($_COOKIE["redirect_from_homepage"])){
    echo "<p class='connection_error' >".$_COOKIE["redirect_from_homepage"]."</p>";
}

if(isset($_SESSION["Admin_Login_errors"])){
   foreach($_SESSION["Admin_Login_errors"] as $error){
    echo "<p>".$error."</p>";
   }
   unset($_SESSION["Admin_Login_errors"]);
}


if(isset($_SESSION["admin_category_errors"])){
    foreach($_SESSION["admin_category_errors"] as $error){
        echo "<p>".$error."</p>";
    }
    unset($_SESSION["admin_category_errors"] );
 }
 

