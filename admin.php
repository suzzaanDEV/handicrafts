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
                background-color: lightcoral;
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

// Include the connection file
@include 'connection.php';

// Product operations
if (isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

    if ($insert_query) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Product added successfully';
    } else {
        $message[] = 'Could not add the product';
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die('query failed');
    if ($delete_query) {
        header('location: admin.php');
        $message[] = 'Product has been deleted';
    } else {
        header('location: admin.php');
        $message[] = 'Product could not be deleted';
    }
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'Product updated successfully';
        header('location: admin.php');
    } else {
        $message[] = 'Product could not be updated';
        header('location: admin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message"><span>' . htmlspecialchars($msg) . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    }
}
?>

<?php include 'adminheader.php'; ?>

<div class="container">
    <section>
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Add a New Product</h3>
            <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
            <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Add the Product" name="add_product" class="btn">
        </form>
    </section>

    <section class="display-product-table">
        <table>
            <thead>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($row = mysqli_fetch_assoc($select_products)) {
                ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo htmlspecialchars($row['image']); ?>" height="100" alt=""></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>Rs. <?php echo htmlspecialchars($row['price']); ?>/-</td>
                    <td>
                        <a href="admin.php?delete=<?php echo htmlspecialchars($row['id']); ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                        <a href="admin.php?edit=<?php echo htmlspecialchars($row['id']); ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<div class='empty'>No product added</div>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section class="edit-form-container">
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <img src="uploaded_img/<?php echo htmlspecialchars($fetch_edit['image']); ?>" height="200" alt="">
            <input type="hidden" name="update_p_id" value="<?php echo htmlspecialchars($fetch_edit['id']); ?>">
            <input type="text" class="box" required name="update_p_name" value="<?php echo htmlspecialchars($fetch_edit['name']); ?>">
            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo htmlspecialchars($fetch_edit['price']); ?>">
            <input type="file" class="box" name="update_p_image" accept="image/png, image/jpg, image/jpeg">
            <input type="submit" value="Update the Product" name="update_product" class="btn">
            <input type="reset" value="Cancel" id="close-edit" class="option-btn">
        </form>
        <?php
                }
            }
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
        }
        ?>
    </section>
</div>

<!-- Custom JS file link -->
<script src="script.js"></script>

</body>
</html>
