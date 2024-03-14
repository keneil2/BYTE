<title> Products</title>
<?php 
require_once "layout/admin.nav.php";
require_once dirname(__FILE__,2)."/models/admin.model.php";
require_once dirname(__FILE__,2)."/models/Products.model.php";
$result=new Product();
$results=$result->displayProducts(new dbcon );
?>
<style>
    table{

    }
    tr,th{
        border-bottom:1px solid black;
    }
    td{
        width:300px;
    }
    form button{
        background-color:#2272FF;
        padding:5px 10px;
        border-radius:5px;
        margin-left:10px;
        border:none;
        color:white;
    }
    .actions{
        display:flex;
        justify-content:center;
        
        
    }
    .deleteBtn{
        background-color: red;
    }
</style>
<center>
<table >
    <th>ITEM NAME</th>
    <th>PRICE</th>
    <th>Category</th>
    <th>Image</th>
    <?php foreach($results as $item){?>
     <tr><td><?php echo $item["food_name"]?></td>
     <td><?php echo "$".$item["price"]?></td>
     <td><?php echo $item["category_name"]?></td>
     <td class="actions" ><form action=""><button>update</button></form>
     <form action=""><button class='deleteBtn'>delete</button><input type="hidden"></form></td>
    </tr>
        <?php }?>
</table></center>
