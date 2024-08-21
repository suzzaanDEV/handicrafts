<?php
@include 'connection.php';
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$userId = $_SESSION['userId'];

// Fetch user's orders
$order_query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = '$userId' ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="orders.css">
    <?php require("./header.php"); ?>
    <!-- Inline CSS for status tags -->
    <style>
      #hero-title{
         display: none;
      }
        .status-delivered {
            color: white;
            background-color: green;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
        .status-pending {
            color: black;
            background-color: yellow;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
        .status-rejected {
            color: white;
            background-color: red;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>

</head>
<body>

<div class="container">
    <h1 class="heading">My Orders</h1>

    <?php if (mysqli_num_rows($order_query) > 0): ?>
        <?php while ($order = mysqli_fetch_assoc($order_query)): ?>
            <div class="order-card">
                <div class="order-header">
                    <h2>Order #<?= htmlspecialchars($order['id']); ?></h2>
                    <span class="order-date"><?= date('F j, Y', strtotime($order['order_date'])); ?></span>
                    <span class="order-status <?= 'status-' . strtolower($order['state']); ?>">
                        <?= htmlspecialchars($order['state']); ?>
                    </span>
                </div>
                <div class="order-details">
                    <h3>Products:</h3>
                    <p><?= htmlspecialchars($order['total_products']); ?></p>
                    <h3>Total Price:</h3>
                    <p>Rs. <?= number_format($order['total_price']); ?>/-</p>
                    <h3>Shipping Address:</h3>
                    <p><?= htmlspecialchars($order['flat']); ?>, <?= htmlspecialchars($order['street']); ?>, <?= htmlspecialchars($order['city']); ?>, <?= htmlspecialchars($order['state']); ?>, <?= htmlspecialchars($order['country']); ?> - <?= htmlspecialchars($order['pin_code']); ?></p>
                    <h3>Payment Method:</h3>
                    <p><?= htmlspecialchars($order['method']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</div>

</body>
</html>
