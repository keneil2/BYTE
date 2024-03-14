<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/homepage.css">
    <title>Document</title>
</head>
<body>
<?php 
if (isset($_COOKIE['userName'])){
        $display="Welcome  ".$_COOKIE['userName'];
    }else if(isset($_COOKIE['username'])){
        $display="Welcome  ".$_COOKIE['username'];
    }else if (!isset($_COOKIE['username']) && !isset($_COOKIE['username'])){
        header('Location:/login');
        setcookie('redirect_from_homepage','you have to login or signup first', time()+12,'/');
        exit;
    }
require_once "layout/navbar.view.php";
 ?>
 <div class="about-us">
 <center><h5>special Moments</h5>
<h1>ABOUT US<h1></center>
<div class="items">
    <div class="image">
        <img src="public\css\img\Jamaican-Jerk-Chicken-Recipe-SQ.jpg" alt="tradional jamaican food">
    </div>
    <div class="more">
        <div><h5>Taste tradition</h5></div>
        <h3>Tradition <span>& Mordern<span></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Fugit iste eligendi itaque modi</p>
        <button><a href="/about">View More</a></button>
   
        
    </div>
    <div class="image">
        <img src="public\css\img\pexels-jonathan-borba-2983099.jpg" alt="modern food">
    </div>
</div>
 </div>
 <h2 class="featured" >FEATURE DISHES</h2>
 <?php require_once "layout/featured.php";?>
</body>
</html>