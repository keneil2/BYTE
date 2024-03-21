<?php
class router
{
   public $uri;
   public $routes = [
      // this is like a look up table for each thing that might be typed in the url
      "/" => "index.php",
      "/signup" => "app/views/signup.php",
      "/login" => "app/views/login.php",
      "/home" => "app/views/homepage.php",
      "/Email_varification" => "app/views/auth/varification.view.php",
      "/var_Email" => "app/controllers/var_code.contrl.php",
      "/orders" => "app/views/admin-dashboard.view.php",
      "/new-admin" => "app/views/newadmin.view.php",
      "/admin-login" => "app/views/admin.login.view.php",
      "/logout" => "app/controllers/logout.contrl.php",
      "/manage-Admins" => "app/views/manage-admin.php",
      "/update-admins" => "app/views/update.view.php",
      "/update" => "app/controllers/admin-update.controller.php",
      "/delete-admin" => "app/controllers/admin-delete.controller.php",
      "/signup-contrl" => "app/controllers/signup.controller.php",
      "/Categories" => "app/views/createCategory.view.php",
      "/new-category" => "app/views/new-category.view.php",
      "/add-category" => "app\controllers\addcategory.contrl.php",
      "/create_Content" => "app/views/createContert.view.php",
      "/add-Content" => "app\controllers\createContent.control.php",
      "/update_Category" => "app/views/updatecategory.view.php",
      "/update_category_controller" => "app/controllers/update.category.php",
      "/products" => "app/controllers/displayProduct.control.php",
      "/Product" => "app/views/Product.view.php",
      "/productUpdate" => "app/views/ProductUpdate.view.php",
      "/productcontrl" => "app\controllers\Products.control.php",
      "/Food_Items" => "app/views/productPage.view.php",
      "/delete_item" => "app\controllers\product_deleter.php",
      "/addtocart" => "app/controllers/addtocart.php",
      "/getcartdata"=>"app/views/layout/cartitems.php",
      "/cartItems"=>"app/views/layout/cartitems.php"

   ];
   function __construct($uri)
   { // takes current server URI
      $this->uri = $uri;
   }
   function givingresponce($code = 404)
   { //this give http response
      http_response_code($code); //this function sets the sever response code in this case I only know about 404 which means the page is not found
      // checking if the file exist
      if (file_exists("app/views/$code.php")) {
         require_once "app/views/$code.php";
         return $this;
      } else {
         require_once "app/views/nofile.php";// requiring a view with that shows that the page cant be found
         return $this; // basicall returning the object
      }
   }
   function run()
   { // runs the router
      $parseUri = strpos($this->uri, "?");
      if ($parseUri !== false) {
         $new_uri = preg_split("/\?/", $this->uri);
         $this->uri = $new_uri[0];

      }
      if (array_key_exists($this->uri, $this->routes)) {
         require_once $this->routes[$this->uri]; // what happening here? remember uri key which is like the index of the array
      } else {
         $this->givingresponce(); // giving the response if the $code.php exist 
      }
   }
}