<?php 
// handles user varification code
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["var_code"])){
        if($_GET["var_code"]==$_COOKIE["Var_code"]){
         header("Location:/home"); 
        }
}}