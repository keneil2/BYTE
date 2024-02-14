<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
if ($_SESSION["Login_status"]==true){
    echo "login successful";
}else{
    echo "<p font-color='red'>useraname or password is in correct!</p>";
}}