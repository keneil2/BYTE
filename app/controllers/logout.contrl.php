<?php
if ($_SERVER["REQUEST_METHOD"]=="GET"){
   $_SESSION=[];
   $params=session_get_cookie_params();
   setcookie("PHPSESSID","",time()-3600,$params["path"],$params["domain"],$params["httponly"]);
   session_destroy();

   $cookies = $_COOKIE;
// Loop through each cookie and set its expiration time to the past
// foreach ($cookies as $name => $value) {
    // setcookie($name, '', time() - 3600, '/');
    unset($_COOKIE["username"]); // Optionally, unset the cookie variable from the $_COOKIE array
    unset($_COOKIE["userName"]); // Optionally, unset the cookie variable from the $_COOKIE array
header("Location:/login");}else{
    header("Location:/login");
}