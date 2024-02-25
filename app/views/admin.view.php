<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/admin.css">
    
    <title>Document</title>
</head><?php
?>
<body>
   <nav>
   <div class="side-bar"><h1>JT</h1>
   <ul>
    <li><img src="public/css/img/find-out.png" alt=""><a href="/dashboard">DashBoard</a></li>
    <li><img src="public/css/img/checkout-counter.png" alt=""><a href="/orders">Orders</a></li>
    <li><img src="public/css/img/customer.png" alt=""><a href="/clients">clients</a></li>
    <li><img src="public/css/img/trend.png" alt=""><a href="/Statistics">Statistics</a></li>
    <li><img src="public/css/img/piggy-bank.png" alt=""><a href="/Finance">Finance</a></li>
    <li><img src="public/css/img/faq.png" alt=""><a href="/FAQ">FAQ</a></li>
    <li><img src="public/css/img/support.png" alt=""><a href="/support">support</a></li>
    <li><img src="public/css/img/logout.png" alt=""><a href="/logout">Logout</a></li>
   </ul>
</div>


   <div class="admin-section">
   <!-- <nav> -->
<div class="date"><img src="public/css/img/calendar.png"><p>FEB 12,2024</p></div>
<div class="right-nav">
<div class="search-bar"><input type="text" placeholder="..Search"><i class="fa-solid fa-magnifying-glass"></i></div>
<div><i class="fa-regular fa-bell"></i></div>
<div class="profile">   <img src="public/css/img/9703596.png" alt="admin-profile-pic"> </div>
</div>
</div>
</nav>


<section class="adminPanel">
<div class="quick-display">
   <div class="heading"><h1>ORDERS</h1> <p>Daily</p><p>Monthly</p></div>
   <div class="Order-info">
   <div class="Orders"><h3>New orders</h3>
   <p><span>245</span>impression-20%</p>
</div>
   <div class="Orders">
   <h3>New orders</h3>
   <p><span>245</span>impression-20%</p>
   </div>
   <div class="Orders">
   <h3>New orders</h3>
   <p><span>245</span>impression-20%</p>
   </div>
   </div> 
</div>

</section>
<section class="admin-table">
<div class="table">
   <table style="width:100%">
   <tr>
    <th>All orders</th>
    <th>Pending Orders</th>
    <th>Delivered Orders</th>
    <th>Booked Orders</th>
    <th>Cancel Orders</th>
  </tr>
  <tr>
   <td>
      <img src="public/css/img/menu.png">
    <p>Order ID</p>
   </td>
   <td>
      <img src="public/css/img/calendar.png" alt="">
      <p>Ordered Date</p>
   </td>
   <td>
      <img src="public/css/img/box.png" alt="">
      <p>Product Name</p>
   </td>
   <td>
      <img src="public/css/img/tag.png" alt="">
      <p>Price Tag</p>
   </td>
   <td>
      <img src="public/css/img/signal.png" alt="">
      <p>Status</p>
   </td>
  </tr>
   </table>
</div>
</section>
   <script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>
</body>
</html>