<?php
include("connection.php");

if (isset($_POST['reset'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform necessary validation and sanitization for the input fields

    // Check if the username and email exist in your user database table
    $query = "SELECT * FROM form WHERE user_name='$username' AND email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Update the user's password in the database
        $query = "UPDATE form SET password='$password' WHERE user_name='$username' AND email='$email'";
        $updateResult = mysqli_query($conn, $query);

        if ($updateResult) {
            echo "<script>alert('Password reset successfully')</script>";
        } else {
            echo "<script>alert('Failed to reset password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username or email')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">
                Reset Password
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="username">Username</label>
                    <input type="text" class="input" name="username" required>
                </div>
                <div class="input_field">
                    <label for="email">Email</label>
                    <input type="email" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label for="password">New Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <div class="input_field">
								<label></label>
                    <input type="submit" value="Reset" class="btn" name="reset">
                </div> 
								<div class="input_field">
			           <p class="text-center mt-3"> <a href="login.php" class="btn">Log In</a></p>
			          </div> 
            </div>
        </form>
    </div>
</body>
</html>
