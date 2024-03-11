<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content</title>
    <style>
    form input[type="text"]{
        height:50px;
        width:350px;
        border-radius: 10px;
        margin-top:20px;
        padding:5px;
        border: none;
        outline:none;
    }
    form input::placeholder{
        color:black;
        margin:10px;

    }
    form input[type="file"]{
        width:200px;
        /* background-color:blueviolet; */
    }
    .form{
    border: 1px solid black;
    /* background-color: wheat; */
    width:fit-content;
    padding:30px 10px;
    }
    select{
        margin: 15px 0px;
        font-size: 1.2rem;
        background-color: white;
    }
    button{
        background-color: green;
        color:white;
        width:150px;
        border-radius:5px;
        padding:8px 15px;
    }
    </style>
</head>

<body>
    <?php
    use app\models\AdminDb;
    require "layout/admin.nav.php";
    require_once  (dirname(__FILE__, 2) . "/models/admin.model.php");
    require_once "app/views/layout/admin.nav.php";
    ?>
    <center>
        <div class="form">
        <h2>Add Item</h2>

        <form action="/add-Content" method="POST" enctype="multipart/form-data">
            <input type="file" name="pic"><br>
            <input type="text" name="title" placeholder="Enter title of the item"><br>
            <input type="text" name="price" placeholder="Enter title of the item"><br>
            <select name='category-id'>
            <?php $display = new AdminDb();
            // var_dump($_SESSION["file_error"]);
            // echo  $_SESSION["wrong_file_Type"];
            // unset($_SESSION["file_error"]);
            $display->setTablename("categories");
            $result = $display->DbTableValues();
            echo "
            <option value=''>select a category</option>";
            foreach ($result as $rows) {
            $rowid=$rows["ID"];
                echo "<option value= $rowid>". $rows["CATEGORY_NAME"] . "</option>";
            }
            ?>
          </select><br>
            <textarea name="itemDescription" cols="40" rows="5" placeholder="Enter a description here"></textarea><br>
       
          <button type="submit" name="submitBtn">ADD ITEM</button>
        </form>
        </div>
    </center>

    <?php require_once "app/views/layout/error.view.php"; ?>
</body>

</html>