<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    // require "public/css/login.css";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Document</title>
</head>
<body>
    <?php
    $display="Login here"; 
    require "layout/navbar.view.php";
    ?>


<div class="container">
    <?php require "login.error.view.php"?> 
    <form action="../app/controllers\login.controller.php" method="POST">
   <label for="username">Username</label><br>
   <input type="text" placeholder="please enter you useranme" name="username"><br>
   <label for="username">Email</label><br>
   <input type="text" placeholder="please enter you EMAIL" name="email"><br>
   <label for="pwd">Password</label><br>
   <input type="password" name="pwd"><br>
   <input type="submit" value="Login">
    </form></div>
</body>
</html>