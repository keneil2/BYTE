<?php 
// require_once "config/session.php";
// var_dump(session_status());
// if(session_status()){
//     echo 'started';
//     var_dump($_SESSION);
// }else{
//     echo 'didn start';
    
// }
// error_log($_SESSION);

// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/signup.css">
    <title>Document</title>
</head>
<body>
    
   <?php $display="SIGN UP AND BOOK A TABLE IN SECONDS";
   require_once "layout/navbar.view.php"; ?>
   <div class="form">
    <form action="/" method="POST">
    <!-- <h2 font-color="red">SIGN UP HERE</h2> -->
    <?php require_once "layout/error.view.php";
    ?>
    <input type="text" name="userName" placeholder="Create a Useranme"><br>
    <input type="email" name="Email" placeholder="Enter an Email"><br>
    <input type="password" name="Password" placeholder="Enter a password"><br>
    <input type="text" name="reTyedPassWord" placeholder="Re-Enter the password"><br>
    <center><button type="submit">SIGNUP</button></center>
    <div>
        <p>Login with</p>
   <!-- <a href="https://www.facebook.com/login/"><img src="public/facebook.png" alt="facebook-icon"></a> -->
    <!-- <a href="https://www.facebook.com/login/"><img src="public/reddit.png" alt="reddit-icon"></a> -->
    </div>
    </div>
    <!-- <i class="fa-brands fa-facebook" style="color: #1441c8;"></i> -->
    </form>
     </div>
     </div>
     <script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>
</body>
</html>