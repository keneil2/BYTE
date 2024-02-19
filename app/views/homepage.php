<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/homepage.css">
    <title>Document</title>
</head>
<body>
<?php $display="Welcome  ".$_COOKIE['userName'];
require "layout/navbar.view.php";
 ?>
 <div class="about-us">
 <center><h5>special Moments</h5>
<h1>ABOUT US<h1></center>
<div class="items">
    <div class="image">
        <img src="public\css\img\pexels-jonathan-borba-2983099.jpg" alt="modernfood">
    </div>
    <div class="more">
        <h5>Taste tradition</h5>
        <h3>Tradition <span>And Mordern<span><h3>
    </div>
    <div class="image">
        <img src="public\css\img\pexels-jonathan-borba-2983099.jpg" alt="modernfood">
    </div>
</div>
 </div>
</body>
</html>