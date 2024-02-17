<?php
// data base conncetion class
class dbcon{
    private $host="localhost";
    private $dbName="registration_";
    private $pWd="";
    private $userName="root";
    function  Db_connection(){
        try{
       $con= new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->userName,$this->pWd);
       $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       return $con;
    }catch(Exception $e){
       $_SESSION["conncetion_error"]="<pstyle='color:red;'> connection error:check your internet connection</p>";
       header("Location:/login");
       exit("");
    }
    }
}