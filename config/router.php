<?php
class router{
public  $uri;
 public $routes=[       
     // this is like a look up table for each thing that might be typed in the url
    "/"=> "index.php",
    "/signup"=> "app/views/signup.php",
    "/login"=> "app/views/login.php",
    "/home"=> "app/views/homepage.php",
    ];
 function __construct($uri){ // takes current server URI
    $this->uri=$uri;
 }
 function givingresponce($code=404){ // this give http response
    http_response_code($code); // this function sets the sever response code in this case I only know about 404 which means the page is not found
    // checking if the file exist
    if(file_exists("app/views/$code.php")){
    require "app/views/$code.php";
    return $this;
}else{
        require "app/views/nofile.php";// requiring a view with that shows that the page cant be found
        return $this; // basicall returning the object
    }
 }
 function run(){ // runs the router

 if (array_key_exists($this->uri,$this->routes)) {
    require $this->routes[$this->uri]; // what happening here? remember uri key which is like the index of the array
 }else{
    $this->givingresponce(); // giving the response if the $code.php exist 
 }}
}