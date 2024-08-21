<?php
session_start(); // Start the session

// Define static credentials
define('ADMIN_USERNAME', 'admin@gmail.com');
define('ADMIN_PASSWORD', 'Admin@123');

// Check if the user is trying to log in
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        $_SESSION['loggedin'] = true;
        header('Location: admin.php'); // Redirect to the admin panel
        exit();
    } else {
        $login_error = 'Invalid username or password.';
    }
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #f0f0f0;
            }
            .login-container {
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .login-container h2 {
                margin-bottom: 20px;
            }
            .login-container input {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            .login-container .btn {
                background-color: crimson;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }
            .login-container .btn:hover {
                background-color: crimson;
            }
            .login-container .error {
                color: red;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Admin Login</h2>
            <?php if (isset($login_error)): ?>
                <div class="error"><?php echo htmlspecialchars($login_error); ?></div>
            <?php endif; ?>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="login" value="Login" class="btn">
            </form>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
<?php
@include 'connection.php';

// Check if there is a message to display
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}

// Handle status update
if(isset($_POST['order_id']) && isset($_POST['status'])){
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $update_query = "UPDATE `order` SET state='$status' WHERE id='$order_id'";
    if(mysqli_query($conn, $update_query)){
        echo '<div class="message"><span>Status updated successfully</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    } else {
        echo '<div class="message"><span>Failed to update status</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}

// Handle order deletion
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `order` WHERE id='$id'");
    echo '<div class="message"><span>Deleted successfully</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders -  Handicraft Admin</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="adminOrder.css">
    <link rel="stylesheet" href="style.css">    
</head>
<body>
   
<?php include 'adminheader.php'; ?>

<div class="container">
    <section class="display-orders">
        <h2>All Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Total Products</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch orders from the database
                $select_orders = mysqli_query($conn, "SELECT * FROM `order`");
                if(mysqli_num_rows($select_orders) > 0){
                    while($row = mysqli_fetch_assoc($select_orders)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nam']; ?></td>
                    <td><?php echo $row['num']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['flat'] . ', ' . $row['street'] . ', ' . $row['city'] . ', ' . $row['stat'] . ', ' . $row['country'] . ' - ' . $row['pin_code']; ?></td>
                    <td><?php echo $row['method']; ?></td>
                    <td><?php echo $row['total_products']; ?></td>
                    <td>Rs. <?php echo $row['total_price']; ?>/-</td>
                    <td>
                        <form action="admin_orders.php" method="post" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                            <select name="status" onchange="this.form.submit();">
                                <option value="Pending" <?php if($row['state'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Delivered" <?php if($row['state'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                <option value="Rejected" <?php if($row['state'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="admin_orders.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this order?');"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='10' class='empty'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</div>

<!-- Custom JS file link -->
<script src="script.js"></script>

</body>
</html>
