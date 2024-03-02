<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/add-category" method="GET">
        <input type="text" name="category_name" placehoder="Enter category Name"><br>
        <label>do you want the category to be featured?</label><br>
        <label for="yes">yes</label>
        <input type="radio" name="toFeature" value="Yes">
        <label for="No">No</label>
        <input type="radio" name="toFeature" value="No"><br>
        <button type="submit" >Add Category</button>
    </form>
    <?php if(isset($_SESSION["admin_category_errors"])){
        foreach($_SESSION["admin_category_errors"] as $error){
            echo $error;
        }
    }
        ?>
</body>
</html>