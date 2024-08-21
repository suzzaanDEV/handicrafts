<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="Connect.css">
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200;400;700&family=Courgette&family=Roboto:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container ">
        <!-- Navigation Bar -->
        <nav>
            <div class="icon">
                <h1 class="logo">Handicraft</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a id="home" href="index.php">Home</a></li>
                    <li><a id="shop" href="home.php">Shop</a></li>
                    <li><a id="blog" href="blog.php">Blog</a></li>
                    <li><a id="about" href="about.php">About</a></li>
                    <li><a id="contact" href="contact.php">Contact</a></li>

                    <?php if (isset($_SESSION['valid'])): ?>
                        <!-- Links for logged-in users -->
                        <li><a id="cart" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"><span>(3)</span></i></a></li>
                        <li><a href="users.php"><i class="fa-solid fa-user"></i></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- Links for logged-out users -->
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>

                    <!-- <li class="search-container">
                        <input class="srch" type="text" placeholder="Search for products...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </li> -->
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <section class="hero-section " id="hero-title">
        <div class="hero-text">
            <h1>Welcome to  Handicraft</h1>
            <p>Discover unique handcrafted items for your home.</p>
            <a href="#featured" class="btn">Shop Now</a>
        </div>
    </section>

       
    </div>
</body>
</html>
