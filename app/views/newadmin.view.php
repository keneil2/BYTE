<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "layout/admin.nav.php";?>
</head>
<body>
      <form action="app/controllers/newadmin.contrl.php" method="POST">
      <input type="text" name="userName" placeholder="enter username">
      <input type="text" name="Email" placeholder="enter Email">
      <input type="text" name="Pwd" placeholder="enter Password">
      <input type="text"  name="retypedPwd" placeholder="enter Retype-Password">
      <button type="submit">add New admin</button>
      <?php require "layout/admin.message.view.php";
      ?>
      </form>
      
</body>
</html>