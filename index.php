<?php
// spl_autoload_register(function($class){
//     require_once 'config/session.php';
// });
// Session::Sstart();
// require_once "app\controllers\signup.controller.php";
require_once "config/session.php";
Session::Sstart();
require_once "config/autoload.php";
require_once "config/dbcon.php";