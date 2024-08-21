<?php

require_once 'connection.php';

$sql = "SELECT * FROM products";
$all_product = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Piedra&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
</head>

<body>


    <!-- Footer -->

    <div class="footer">
        <div class="Ftext">
            <h3>messangers</h3>
            <p>Service</p>
            <p>Customer</p>
            <p>Satisfation</p>

        </div>
        <div class="Ftext">
            <h3>About us</h3>
            <p><b>Address :</b> Near Gyan Complex <br>Chapagaoun, Lalitpur
            </p>


        </div>
        <div class="Ftext">
            <h3>Contact</h3>
            <p>9812032158</p>
            <p><b>Email : </b><a href="#"><i>messangercollab@gmail.com</i></a></p>

        </div>
        <div class="Ftext">
            <h3>Blog</h3>
            <p><a href="blog.php">Company</a></p>
            <p><a href="blog.php">Products</a></p>
        </div>
        <div class="Ftext">
            <h3>More</h3>
            <p><a href="#">Visit us</a></p>
        </div>
    </div>

    </div>
    <script src="indexx.js"></script>
    <div class="messanger"><a id="" onclick="" href="https://www.facebook.com/" target="_blank"><i
                class="fa-brands fa-facebook-messenger"></i></a></div>
    <!-- LOGOUT -->

</body>

</html>