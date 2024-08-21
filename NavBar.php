<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>

    <link rel="stylesheet" href="index.css"/>
</head>
<body>
<div class="main">
<div class="navbar">
            <div class="icon">
                <h2 class="logo"> Handicraft</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a onclick="home()" href="index.php">Home</a></li>
                    <li><a onclick="shop()" href="home.php">Shop</a></li>
                    <li><a onclick="blog()" href="blog.php">Blog</a></li>
                    <li><a onclick="about()" href="about.php">About</a></li>
                    <li><a onclick="contact()" href="contact.php">Contact</a></li>
                    <li><a onclick="" href="mycart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
                   <li> <a onclick="" href="users.php"> <i class="fa-solid fa-user"></i></a></li>
                </ul>
            </div>
            <form>
                <input  class="srch" type="text" placeholder="  Search for products...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
        </div> 
        </div>
    </div>
</body>
</html>