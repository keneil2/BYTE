<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/signup.css">
    <title>Document</title>
</head>
<body>
    <div class="heroImage">
 <img src="public/css/burger.jpg" alt="hero image">
    </div>
    <div class="signup">
    <form action="..\app\controllers\signup.controller.php" method="POST">
    <input type="text" name="userName" placeholder="Create a Useranme">
    <input type="email" name="Email" placeholder="Enter an Email">
    <!-- <input type="email" name="reTypedEmail" placeholder="Retype The email enterd above"> -->
    <input type="password" name="Password" placeholder="Enter a password">
    <!-- <input type="text" name="reTyedPassWord" placeholder="Re-Enter the password"> -->
    <button type="submit">SIGNUP</button>
    </form>
    </div>
</body>
</html>