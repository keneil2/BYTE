<?php
// ini_set("log_errors",0);
// $filename = "config/error_log_file.txt";
// if (file_exists($filename)) {
//     chmod($filename, 0644);
//     echo "done";
// }
// ini_set("error_log","C:\xampp\htdocs\MVC FRAMEWORK\config\error_log_file.txt");
// ini_set("display_errors",3);
// error_reporting(E_ALL);
require_once "config/session.php";
Session::Sstart();
require_once "config/autoload.php";
require_once "config/dbcon.php";
// echo $HH;
// echo jfnnfirngtfg;



// function logError($errno, $errstr, $errfile, $errline) {
//     $message = "Error number: $errno Error string: $errstr Error file: $errfile Line number: $errline".PHP_EOL;
//     $filename="config/error_log_file.txt";
//     $fileHandler=fopen($filename,"a+");
//     fwrite( $fileHandler,$message);
//     fclose ($fileHandler);
//     return true;
// }
// set_error_handler("logError");