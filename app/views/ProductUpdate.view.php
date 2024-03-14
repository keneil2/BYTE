<title>Update Admin</title>
 <?php 
spl_autoload_register(function ($class) {
    require_once "app/models/admin.model.php";
});
 use app\models\AdminDb;
 require_once "layout/admin.nav.php";
?>  
<?php
if(empty($_COOKIE["login_status"])){
     header("Location:/admin-login");
 }?>
  <style>
    .upadated{
      color:green;
      font-size: 1.2rem;
      margin-bottom: 20px;
      
    }
 div{
   display:flex;
   justify-content:center;
   align-items:center; 
   font-weight: bold;
  }
   form input{
  width:250px;
  height:40px;
  margin-bottom:20px;
   }
   input[type='submit']{
    width:250px;
  height:40px;
  background-color: green;
  border-radius:10px;
  color:white;
  font-size:1.2rem;
   }
   .Error{
    color:red;
    margin-bottom:10px;
   }
  </style>

 
   
   
   
    
    <div>
      
    <form action="/productcontrl" method="POST">
    <?php 
    if(isset($_SESSION["product_admin_message"])){
    echo "<p class='upadated'>".$_SESSION["product_admin_message"]."</p>";
    unset($_SESSION["product_admin_message"]);}
    ?>


   <?php require_once "layout/login.error.view.php";?>


      <?php
      if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(isset($_GET["ProductId"])){
        $getinput=new AdminDb();
        $id=$_GET["ProductId"];
        $result=$getinput->selectBYId($id,"foods") ?? "empty";
        echo "<input type='text' name=id value=".$id.">";
      }}
        ?>
        <label>product Name</label><br><input type='text'name='food_name' value=<?php  if(isset($result)){echo $result["food_name"];}?>> <br>
        <label>Price</label><br><input type='text'name='Price' value=<?php  if(isset($result)){echo $result["price"];}?>><br>
        <label>description</label><br><textarea cols="40" rows="5" name='description' ><?php  if(isset($result)){echo $result["description"];}?></textarea><br><br>
        <input type='submit' value="Update user">
    </form>
    </div>
    