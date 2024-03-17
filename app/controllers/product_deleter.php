<?php
use app\controllers\Error;
use app\models\AdminDb;

spl_autoload_register(function ($class) {
    require_once $class . "s_controller.php";
    require_once dirname(__FILE__, 2) . "/models/admin.model.php";
});
if (Error::isRequestMethod("GET")) {
    $id = Error::sanitizeInput($_GET["ProductId"]);
    $itemDeleter = new AdminDb();
    $itemDeleter->Deleteadmin($id, "foods");
    header("Loaction:/Product");
}