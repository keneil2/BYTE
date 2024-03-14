<title>Update Category</title>

<?php
if(empty($_COOKIE["login_status"])){
     header("Location:/admin-login");
 }?>
<style>
.form{
    display:flex;
    justify-content: center;
    align-items: center;
}
input{
    height:50px;
    width:250px;
}
button{
    height:50px;
    width:250px;
    background-color:green;
    color:white;
    /* font-size:1.1rem; */

}
</style>
 <?php
 use app\models\AdminDb;
 require_once dirname(__FILE__,2)."/models/admin.model.php";
 require_once "layout/admin.nav.php";
 
 if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["categoryID"])){
 
        $categoryname=new AdminDb();
        $results=$categoryname->selectBYId($_GET["categoryID"],"categories");
        $categoryName=$results["CATEGORY_NAME"];
        $display=$results["to_feature"];
        $id=$_GET["categoryID"];
    }else{
        $categoryName="";
        $display="";
        $id="";
    }
    var_dump($_SESSION["category_update"]);
    unset($_SESSION["category_update"]);
    echo $_SESSION['m'];
 ?>
 <div class="form">

<form action="/update_category_controller" method="POST">
    <label for="category">Category Name</label><br><br>
    <input type="text" name="category" value=<?php echo $categoryName ?>><br><br><br>
    <label for="display">To feature or Not</label><br><br>
    <input type="text" name="display" value=<?php echo $display ;?>> <br>
    <input type="hidden" name="id" value=<?=$id;?>><br>
    <button>Update</button>
</form></div>
