<?php require_once('./header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php 
        include("connection.php");
        

        if(isset($_POST['submit'])){
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $number = trim($_POST['number']);
            $password = trim($_POST['password']);

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='message'>
                        <p>Invalid email format. Please enter a valid email!</p>
                      </div><br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            } else {
                // Check if the email already exists
                $verify_query = $conn->prepare("SELECT Email FROM login WHERE Email = ?");
                $verify_query->bind_param("s", $email);
                $verify_query->execute();
                $result = $verify_query->get_result();

                if ($result->num_rows > 0) {
                    echo "<div class='message'>
                            <p>This email is already in use. Try another one!</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    // Hash the password before storing
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Insert the user data
                    $stmt = $conn->prepare("INSERT INTO login (Username, Number, Email, Password) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $username, $number, $email, $hashed_password);

                    if ($stmt->execute()) {
                        echo "<div class='message'>
                                <p>Registration successful!</p>
                              </div><br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
                    } else {
                        echo "<div class='message'>
                                <p>Error occurred during registration. Please try again.</p>
                              </div><br>";
                    }
                }

                $verify_query->close();
            }
        } else {
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="number">Number</label>
                    <input type="number" name="number" id="number" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
