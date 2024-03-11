
<?php 
include_once "layout/admin.nav.php";

include_once "app/models/admin.model.php";
use app\models\AdminDb;
?>
<body>
<style> 
    table{
        width:80%;
    }
    h3{
        margin-bottom:20px;
        left:100px;
        text-decoration:underline;
    }
    .table{
        width:100%;
    display:flex;
    flex-direction: column;
  justify-content: flex-start;
  align-items: center;
    }
    td{
        text-align: center;
    }
    .add-button{
        margin-left:200px;
        background-color:#2272FF;
        padding:5px 10px;
        border-radius: 5px;
        border:1px solid rgba(0,0,0,0.5);
        color:white;
    }
    .add-button:hover{
        background-color:lightskyblue;
    }
    form button{
        background-color:#2272FF;
        padding:5px 10px;
        border-radius:5px;
        margin-left:10px;
        border:none;
        color:white;
    }
.delete{
    background-color: red;
}
    .actions{
        display:flex;
        justify-content:center;
        
    }

<?php
if(empty($_COOKIE["login_status"])){
     header("Location:/admin-login");
    $_SESSION[""]="";
 }?>
</style>
<form action="/new-admin"><input class="add-button" type="submit" value="Add New User"></form>
<div class="table">
   <center><h3>REGISTERED USERS</h3></center>
<table>
    <tr>
        <th>
            <p>ID</p>
        </th>
        <th>
            <p>Username</p>
        </th>
        <th>
            Email
        </th>
        <th>
            <p>Date registed</p>
        </th>
        <th>
            <p>Actions</p>
        </th>
    </tr>
 
        <?php
         $users=new AdminDb();
         $Userdata=$users->disPlayUsers();
        foreach( $Userdata as $row ){
            echo"<tr>";
            foreach($row as $key=>$value){
            $num=0;
            if ($key!=="PWD"){
                echo"<td>".$value."</td>";
            }
          
        }
        echo "
        <td class='actions'>
        <form action='/delete-admin'>
        <input type='hidden' name='user_id' value='".$row["ID"]."'>
        <button class='delete'>delete</button></form>
      <form action='/update-admins' method='GET'>
      <input type='hidden' name='user_id' value='".$row["ID"]."'>
           <button>Update</button>
           </form>
        </td>
    </tr>";
    }
        if (isset($error)){
            echo "<td>".$error."</td>";
        }
        ?>
</table>
</div>
</body>