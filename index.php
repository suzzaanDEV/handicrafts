<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Handicraft</title>
    <link rel="stylesheet" href="index.css">
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="featured-products" id="featured">
        <h2>Featured Products</h2>
        <div class="product-container">
            <?php
            require("./connection.php");

            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="product-item">
                <img src="uploaded_img/<?php echo htmlspecialchars($fetch_product['image']); ?>" alt="<?php echo htmlspecialchars($fetch_product['name']); ?>">
                <div class="product-info">
                    <h3><?php echo htmlspecialchars($fetch_product['name']); ?></h3>
                    <p>$<?php echo htmlspecialchars($fetch_product['price']); ?></p>
                    <a href="home.php" class="btn">Learn More</a>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </section>

    <section class="about-us">
        <h2>About Us</h2>
        <p>At  Handicraft, we take pride in creating beautiful, handcrafted items that add a personal touch to your home. Our artisans use traditional techniques to craft each piece with care and dedication.</p>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
