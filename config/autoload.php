<?php 
spl_autoload_register(function($class_name){
    require_once "router.php";
});
// require_once "app/models../Register.model.php";
// $Con=new dbcon();
// $Con->db_connection();

$router=new router(parse_url($_SERVER["REQUEST_URI"])["path"]);
$router->run();
