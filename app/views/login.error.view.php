<?php 

if(isset($_SESSION["login_errors"])){
foreach ($_SESSION["login_errors"] as $key) {
    echo $key;
}}