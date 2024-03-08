 <?php 
spl_autoload_register(function ($class) {
    require_once "app/models/admin.model.php";
});
 use app\models\AdminDb;
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
    require_once "layout/login.error.view.php";
    ?>
    <form action="/update" method="POST">
      <?php if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["user_id"])){
        $getinput=new AdminDb();
        $id=$_GET["user_id"];
        $result=$getinput->selectBYId($id)?? "empty";
        echo "<input type='hidden' name=id value=".$id.">";
      }}
        ?>
        <label>Username</label><br><input type='text'name='usename' value=<?php  if(isset($result)){echo $result["USERNAME"];}?>> <br>
        <label>Email</label><br><input type='text'name='email' value=<?php  if(isset($result)){echo $result['EMAIL'];}?>><br>
        <input type='submit' value="Update user">
    </form>
    <?php 
    if(isset($_SESSION["update_admin_message"])){
    echo $_SESSION["update_admin_message"];
    unset($_SESSION["update_admin_message"]);}
    ?>

</body>
</html>