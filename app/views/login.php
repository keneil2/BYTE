<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $display="WELCOME BACK"; 
    // require "layout/navbar.view.php"; 
    ?>




    <form action="/" method="POST">
   <label for="username">Username</label><br>
   <input type="text" placeholder="please enter you useranme" name="username"><br>
   <input type="text" placeholder="please enter you EMAIL" name="email"><br>
   <label for="pwd">Password</label><br>
   <input type="password" name="pwd"><br>
   <input type="submit" value="Login">
   <?php require "login.error.view.php"?>
    </form>
</body>
</html>