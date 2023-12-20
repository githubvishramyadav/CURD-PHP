<?php
// include database connection file
include("connection.php");

// check if form is submitted
if (isset($_POST['login'])) {
  // get form data
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  // sanitize input data
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // hash password for security
  $password = md5($password);

  // query database for user
  $sql = "SELECT * FROM form WHERE user_name = '$user_name' && password = '$password'";
  $result = mysqli_query($conn, $sql);

  // check if user exists
  if (mysqli_num_rows($result) == 1) {
    // user found, start session and redirect to home page
    session_start();
    $_SESSION['user_name'] = $user_name;
    header("Location: home.php");
    exit();
  } else {
    // user not found, display error message and redirect to login page
    echo "<script>alert('Invalid user or password')</script>";
    header("Refresh:0; url=login.php");
    exit();
  }
// }// else {
  // form not submitted, redirect to login page
  header("Location: login.php");
  exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
  <title>Login Form</title>
</head>
<body>
<div class="container">
		<form action="#" method="POST">
		<div class="title">
			Log in user
		</div>
		<div class="form">
		<div class="input_field">
				<label for=""> User Name:</label>
			  <input type="user_name" class="input" id="user_name" name="user_name">
			</div>
   
		<div class="input_field">
				<label for="">Password</label>
			  <input type="password" class="input" id="password" name="password">
			</div>
		<div class="input_field">
		<label for=""></label>
				<input type="submit" value="login" class="btn" name="login">
			</div> 
			<div class="input_field">
			<p class="text-center mt-3">I don't have Account        <a href="form.php" class="btn">Register</a></p> <hr>
			<span class="text-center mt-3"> <a href="reset_password.php" class="btn">Reset Password</a></span>
			</div> 
  </form>
</div>
</body>
</html>