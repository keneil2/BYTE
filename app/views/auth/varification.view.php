<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enter the Code Sent to your Emial</h1>
    <form action="/var_Email">
   <input type="text" name="var_code">
   <input type="submit" value="Varify My Email">
   <br>
   <?php
  if  (isset($_COOKIE["Var_code"])){
    echo "Email sent";
  }

  if(isset($_SESSION["E"])){
    echo "no html if nothing";
  }
   ?>
    </form>
</body>
</html>