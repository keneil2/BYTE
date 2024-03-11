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
      
    <form action="/update" method="POST">
    <?php 
    if(isset($_SESSION["update_admin_message"])){
    echo "<p class='upadated'>".$_SESSION["update_admin_message"]."</p>";
    unset($_SESSION["update_admin_message"]);}
    ?></p>


   <?php require_once "layout/login.error.view.php";?>


      <?php
      if($_SERVER["REQUEST_METHOD"]=="GET"){
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
    </div>
    