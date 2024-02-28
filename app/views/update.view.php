 <?php 
spl_autoload_register(function ($class) {
    require_once "app/models/admin.model.php";
});
 use app\controllers\AdminDb
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
      <?php if($_SERVER["REQUEST_METHOD"]=="GET"){
        $getinput=new AdminDb();
        $result=$getinput->selectBYId($_GET["user_id"]);
        echo "<input type='hidden' name=id value=".$_GET["user_id"].">";
        foreach ($result as $key => $value) {
            if ($key=="USERNAME"){
                echo "<label>Username</label><br><input type='text'name='usename' value='$value'> <br>";
            }
            if ($key== "EMAIL"){
                echo "<label>Email</label><br><input type='text'name='email' value='$value'><br><input type='submit'>";
            }
        }
      }
        ?>
    </form>

</body>
</html>