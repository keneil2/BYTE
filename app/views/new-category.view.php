<style>
.form{
    <?php
if(empty($_COOKIE["login_status"])){
     header("Location:/admin-login");
 }?>
    display: flex;
    justify-content: center;
    align-items:center;
}
input[type="text"]{
    width:250px;
    height:40px;
}
label{
    font-size:1.1rem;
    margin-top:20px;
}
.error{
    color:red;
}
button{
    padding:5px 15px;
    background-color:green;
    color:white;
    border-radius:5px;
}
.success_message{
    color:green;
    font-size: 1.2rem;
    font-weight:bold;
}
</style>
<?php
if(empty($_COOKIE["login_status"])){
     header("Location:/admin-login");
 }?>
    <?php require "layout/admin.nav.php";?>


     <div class="form" >
     

 
     <form action="/add-category" method="GET">
     
     <?php if(isset($_SESSION["admin_category_errors"])){
        foreach($_SESSION["admin_category_errors"] as $error){
            echo "<p class='error'>".$error."</p>";
        }
        unset($_SESSION["admin_category_errors"]);
        
    }?>
    <h3> Add NEW category</h3><br><br>

    <?php  if(isset($_SESSION["new_category_created"])){
      echo "<p class='success_message' >".$_SESSION["new_category_created"]."!!</p>";
    }
     unset($_SESSION["new_category_created"]);?>
        <input type="text" name="category_name" placehoder="Enter category Name"><br><br>
        <label>do you want the category to be featured?</label><br><br>
        <label for="yes">yes</label>
        <input type="radio" name="toFeature" value="Yes">
        <label for="No">No</label>
        <input type="radio" name="toFeature" value="No"><br><br>
        <button type="submit" >Add Category</button>
    </form>
    
    </div>
    