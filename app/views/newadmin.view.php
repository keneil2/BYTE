<style>
    .submit_form{
        display: flex;
      justify-content:center;
      align-items:center;
    }
    form input{
       height:40px;
       width:250px;
       margin:10px 0px;

    }
    form button{
      background-color: green;  
      color:white;
      padding:10px;
      border-radius:10px;
      border:none;
    }
    div{
        
    }
</style>
    <?php require "layout/admin.nav.php";?>

<section class="submit_form" >
    <div>
        <h3>Add New Admin</h3>
<form action="app/controllers/newadmin.contrl.php" method="POST"><br>
      <input type="text" name="userName" placeholder="enter username"><br>
      <input type="text" name="Email" placeholder="enter Email"><br>
      <input type="text" name="Pwd" placeholder="enter Password"><br>
      <input type="text"  name="retypedPwd" placeholder="enter Retype-Password"><br>
      <button type="submit">add New admin</button><br>
      <?php require "layout/admin.message.view.php";
      ?>
      </form>
      </div>
</section>
      
      
