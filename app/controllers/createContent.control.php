<?php use app\controllers\Error;
use app\models\AdminDb;

spl_autoload_register(function ($class) {
  if (file_exists("$class" . "s_controller.php")) {
    require_once "$class" . "s_controller.php";
  } else {
    require_once $class . ".controller.php";
  }

  require_once "app/models/admin.model.php";
});

try {
  if (Error::isRequestMethod("POST")) {
    #check file field for errors
    Error::logFileErrors();
    Error::handleAllError($_POST, ["title", "price", "itemDescription"], URLPATH: "/create_Content");

    # sanitizing input
    $title = Error::sanitizeInput($_POST["title"]);
    $price = Error::sanitizeInput($_POST["price"]);
    $descrition = Error::sanitizeInput($_POST["itemDescription"]);
    $categoryId=intval(Error::sanitizeInput($_POST["category-id"]));
    file::checkFileType($_FILES["pic"]["tmp_name"]);
    $filename = file::movefile($_FILES["pic"]["name"], $_FILES["pic"]["tmp_name"]);

    #uploading file to db
    $uploadFile = new File();
    $uploadFile->setColumns(["food_name", "description", "price", "category_id", "image_path"]);
    $uploadFile->setTablename("foods");
    $uploadFile->insertdata([$title, $descrition, $price, $_POST["category-id"] ,$filename]);
  } else {
    $_SESSION["request_method"] = "invalid request Method";
    ;
  }
} catch (\Exception $e) {
  $_SESSION["debug_errors"] = $e->getMessage();
}