<?php
if (isset($_SESSION["user"])){
  echo $_SESSION["user"];
}
if (isset($_SESSION["feedBack"])){
    foreach ($_SESSION["feedBack"] as $key){
        echo "<p>".$key."<p>";
    }
    unset($_SESSION["feedBack"]);
}