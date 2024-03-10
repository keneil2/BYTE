<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require "layout/admin.nav.php";
    require_once dirname(__FILE__, 2) . "/models/admin.model.php";
    use app\models\AdminDb;

    ?>
    <center>
        <h1>Manage categories</h1>
    </center>
    <style>
        table {
            width: 80%;
            /* margin-top: 10px; */
            margin-left: 20%;
        }

        h3 {
            margin-bottom: 20px;
            left: 100px;
            text-decoration: underline;
        }

        .table {
            width: 80%;
            display: flex;
            flex-direction: column;
            /* height: 100vh; */
            justify-content: flex-start;
        }

        td {
            text-align: center;
        }

        /* form{
        
        
    } */
        .add-button {
            margin-left: 200px;
            background-color: #2272FF;
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: white;
        }

        .add-button:hover {
            background-color: lightskyblue;
        }

        form button {
            background-color: #2272FF;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 10px;
            border: none;
            color: white;
        }

        .actions {
            display: flex;
            justify-content: center;

        }
    </style>
    <form action="/new-category"><input class="add-button" type="submit" value="Add category"></form>
    <div class="table">
        <table>
            <tr>
                <th>
                    <p>CategoryName</p>
                </th>
                <th>
                    <p>Actions</p>
                </th>
            </tr>
            <?php
            #displaying categories from db
            
            $display = new AdminDb();
            $display->setTablename("categories");
            $result = $display->DbTableValues();
            foreach ($result as $rows) {
                echo "<tr>";
                echo "<td>" . $rows["CATEGORY_NAME"] . "</td>";
                echo "<td class='actions'><form action='/update' ><button>Update</button></form> 
                   <form action='/delete' ><button>Delete</button></form></td>";
                echo "<tr>";
            }

            ?>
        </table>
</body>

</html>