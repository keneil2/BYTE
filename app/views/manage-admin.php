
<?php 
include_once "layout/admin.nav.php";

include_once "app/models/admin.model.php";
use app\controllers\AdminDb;
?>
<body>
<style> 
    table{
        width:80%;
        /* margin-top: 10px; */
        margin-left:20%;
    }
    h3{
        /* margin-top: 150px; */
        text-decoration:underline;
    }
    .table{
        width:80%;
    display:flex;
    flex-direction: column;
  /* height: 100vh; */
  justify-content: flex-start;
    }
    form{
        /* z-index:-2; */

        /* margin-top:200px;
        margin-left:500px; */
    }
</style>
<form action="/new-admin" >< <input type="submit" value="submit"></form>
<div class="table">
   <center><h3>Admin Users</h3></center>
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
        //  var_dump($Userdata);
        foreach( $Userdata as $row ){
            echo"<tr>";
            foreach($row as $key=>$value){
            $num=0;
            if ($key!=="PWD"){
                echo"<td>".$value."</td>";
            }
          
        }
        echo "
        <td>
        <form action='/delete-admin'>
        <input type='hidden' name='user_id' value='".$row["ID"]."'>
        <button>delete</button></form>
      <form action='/update-admins'>
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