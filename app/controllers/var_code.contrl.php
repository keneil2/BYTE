<?php 
require_once "app/models\login.model.php";
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["var_code"]) && !empty($_GET["var_code"])){
        Login_model::accountStatus();
        if($_GET["var_code"]==$_SESSION["Var_Code"]){
         header("Location:/home"); 
        }
}else{
    header("Location:/Email_varification");
}}