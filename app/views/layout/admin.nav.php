<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/admin.css">
</head>
<body>
   <nav>
   <h3>JT Admin Pannel</h3>
   <div class="date"><img src="public/css/img/calendar.png"><p><?php 
  date_default_timezone_set('EST');  
   echo date("M d,Y");?></p></div>
   <ul>
    <li><a href="/manage-Admins">manage Users</a></li>
    <li><a href="/orders">Orders</a></li>
    <li><a href="/Categories">Categories</a></li>
    <li><a href="/support">support</a></li>
    <li><a href="/logout">Logout</a></li>
   </ul>
<div class="profile"><img src="public/css/img/9703596.png" alt="admin-profile-pic"></div>
   </nav>

   <div class="nav">
   <div class="admin-section">
</div> 
</div>
