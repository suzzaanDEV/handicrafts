<?php 
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '0');

include("connection.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
    exit();
}

// Fetch user data from the database
$userId = $_SESSION['userId'];
$sql = "SELECT * FROM `login` WHERE Id = '$userId'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "User not found";
    exit();
}

$user = mysqli_fetch_assoc($result);

?>
<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="users.css">
    <script src="https://kit.fontawesome.com/f30fac2c61.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Catamaran:wght@200&family=Courgette&family=Edu+TAS+Beginner:wght@700&family=Lato:wght@300;900&family=Mukta:wght@700&family=Mulish:wght@300&family=Open+Sans&family=PT+Sans:ital,wght@1,700&family=Poppins:wght@300&family=Raleway:wght@100&family=Roboto&family=Roboto+Condensed:wght@700&family=Roboto+Slab&display=swap"
        rel="stylesheet">
    <title>User Profile</title>
</head>
<body>



<!-- ACCOUNT -->
<section class="profile-section">
    <div class="container">
        <div class="profile-header">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="User Image" class="profile-image">
            <div class="profile-info">
                <h3>Account Info</h3>
                <hr>
                <p><b>Username:</b> <?php echo htmlspecialchars($user['Username']); ?></p>
                <p><b>Email:</b> <?php echo htmlspecialchars($user['Email']); ?></p>
                <p><b>Number:</b> <?php echo htmlspecialchars($user['Number']); ?></p>
                <p><a href="orders.php" class="profile-link">Your Orders</a></p>
                <p><a href="logout.php" class="profile-link">Logout</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'footer.php'; ?>

</body>
</html>
