<?php
function Sstart(){
    ini_set("session.use_only_cookies",1);
    session_set_cookie_params( [
        "lifetime"=> 1800,
        "path"=> "/",
        "domain"=> "localhost",
        "secure"=> true,
        "httponly"=> true,
        
    ]);
    
    session_start();
    // session_regenerate_id(true);
    if(empty($_SESSION["last Activity"])){
        $_SESSION["last Activity"] = time();
    }else{
        if(time()-$_SESSION["last Activity"]>=1800){
           session_regenerate_id(true);
           $_SESSION["last Activity"] = time();
        }
    }
}

Sstart();