
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
    <tr>
        <?php
         $users=new AdminDb();
         $Userdata=$users->disPlayUsers();
        foreach( $Userdata as $key=>$value ){
            if ($key!=="PWD"){
                echo"<td>".$value."</td>";
            }
        }
        if (isset($error)){
            echo "<td>".$error."</td>";
        }
        
        ?>
        <td>
        <button>delete</button>
           <button>Update</button>
        </td>
    </tr>
</table>
</div>
</body>