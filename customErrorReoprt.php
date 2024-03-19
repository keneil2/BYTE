<?php
error_reporting(E_ALL);
ini_set("display_errors",0);
function displayErrors($level,$message,$line,$file){
    $Message="Error:".$level."  ".$message."  "."  ".$line."  ".$file;
    error_log($Message,"error_log.txt");
}
set_error_handler("displayErrors");