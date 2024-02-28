 <?php 
//  session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/update" method="POST">
    <input type="text" name="id">
    <input type="text" name="username">
    <input type="text" name="email">
    <input type="text" name="pwd">
    <input type="submit" value="submit">
    
    <?php print_r( $_COOKIE["userId"]);
   ?> 
    </form>

</body>
</html>