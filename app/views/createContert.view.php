<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    use app\models\AdminDb;

    require(dirname(__FILE__, 2) . "/models/admin.model.php");
    require_once "app/views/layout/admin.nav.php";
    ?>
    <center>
        <h2>Add Item</h2>
        <form action="/add-Content" method="POST" enctype="multipart/form-data">
            <input type="file" placehodler="choose a phile" name="pic">
            <input type="text" name="title" placeholder="Enter title of the item"><br>
            <input type="text" name="price" placeholder="Enter title of the item"><br>
            <textarea name="itemDescription" cols="30" rows="10" placeholder="Enter a description here"></textarea><br>
            <button type="submit" name="submitBtn">Submit</button>
            <?php $display = new AdminDb();
            $display->setTablename("categories");
            $result = $display->DbTableValues();
            echo "<select>
            <option>select a category</option>";
            foreach ($result as $rows) {

                echo "<option value=" . $rows["ID"] ." name='category-id' >" . $rows["CATEGORY_NAME"] . "</option>";
            }
            echo "</select>";
            ?>

        </form>
    </center>
    <?php require_once "app/views/layout/error.view.php"; ?>
</body>

</html>