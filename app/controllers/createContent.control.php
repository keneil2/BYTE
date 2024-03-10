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
    # sanitizing inputs
    $title = Error::sanitizeInput($_POST["title"]);
    $price = Error::sanitizeInput($_POST["price"]);
    $descrition = Error::sanitizeInput($_POST["itemDescription"]);
    #check file field for errors
    Error::logFileErrors();
    file::checkFileType($_FILES["pic"]["tmp_name"]);
    Error::handleAllError($_POST, ["title", "price", "itemDescription"], URLPATH: "/create_Content");
    $filename = file::movefile($_FILES["pic"]["name"], $_FILES["pic"]["tmp_name"]);
    #uploading file to db
    $uploadFile = new File();
    $uploadFile->setColumns(["food_name", "description", "price", "image_path"]);
    $uploadFile->setTablename("foods");
    $uploadFile->insertdata([$title, $descrition, $price, $filename]);
  } else {
    $_SESSION["request_method"] = "invalid request Method";
    ;
  }
} catch (\Exception $e) {
  $_SESSION["debug_errors"] = $e->getMessage();
}

echo $_SESSION["content_db_Error"];