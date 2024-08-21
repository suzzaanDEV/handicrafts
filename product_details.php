<?php
@include 'connection.php';
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: login.php"); // Redirect if user is not logged in
    exit();
}

$userId = $_SESSION['userId'];

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");
    if (mysqli_num_rows($select_product) > 0) {
        $product = mysqli_fetch_assoc($select_product);
    } else {
        echo 'Product not found.';
        exit();
    }
} else {
    echo 'No product ID provided.';
    exit();
}
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="product_details.css">
 
</head>
<body>


<div class="container">
    <div class="product-details">
        <div class="product-image">
            <img src="uploaded_img/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="product-info">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <div class="price">Rs. <?php echo htmlspecialchars($product['price']); ?>/-</div>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <form action="" method="post">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['price']); ?>">
                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product['image']); ?>">
                <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
            </form>
        </div>
    </div>
</div>

<!-- Custom JS file link -->
<script src="script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
