<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/navbar.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav1">
            <div class="info"><i class="fa-solid fa-location-dot"></i>kingstion Jamaica</div>
            <div class="info"><i class="fa-solid fa-phone"></i>+1234567890</div>
            <div class="info"><i class="fa-solid fa-envelope"></i>@gmail.com</div>
            <div class="info">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
        </div>
        <div class="nav2">
            <h1>JT.</h1>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/menu">menu</a></li>
                <li><a href="/booking">Reservation</a></li>
                <li><a href="/updates">News</a></li>
                <li><a href="/location">Location</a></li>
                <li><a href="/logout">logout</a></li>
               </ul>
        <button><a href="/table">FIND A TABLE</a></button>
        </div>
        <?php 
        echo"<p class='display'>$display<p>";
        ?>

</nav>
     <script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>
</body>
</html>