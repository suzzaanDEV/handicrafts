<?php 
session_start();
require_once('./header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            if (isset($_SESSION['valid'])) {
                header("Location: home.php");
                exit();
            }

            include("connection.php");

            if (isset($_POST['submit'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                if (!empty($email) && !empty($password)) {
                    // Prepared statement for secure query
                    $stmt = $conn->prepare("SELECT * FROM login WHERE Email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row && password_verify($password, $row['Password'])) { // Verify hashed password
                        // Session variables
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['number'] = $row['Number'];
                        $_SESSION['id'] = $row['Id'];
                        $_SESSION['userId'] = $row['Id'];
                        // Regenerate session ID to prevent session fixation
                        session_regenerate_id(true);

                        header("Location: home.php");
                        exit();
                    } else {
                        echo "<div class='message'>
                                <p>Wrong Email or Password</p>
                              </div><br>";
                        echo "<a href='register.php'><button class='btn'>Go Back</button></a>";
                    }
                } else {
                    echo "<div class='message'><p>All fields are required.</p></div>";
                }
            } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Submit">
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
