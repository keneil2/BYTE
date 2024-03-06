<?php
ini_set("log_errors",1);
ini_set("display_errors",0);
error_reporting(E_ALL); 
function logError($errno, $errstr, $errfile, $errline) {
    $message = "Error number: $errno Error string: $errstr Error file: $errfile Line number: $errline".PHP_EOL;
    $filename="C:\xampp\htdocs\MVC FRAMEWORK\config\error_log_file.txt";
    $fileHandler=fopen($filename,"a");
    fwrite( $fileHandler,$message);
    fclose ($fileHandler);
    return true;
}
set_error_handler("logError");