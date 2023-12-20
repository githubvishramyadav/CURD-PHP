<?php
// include database connection file
include("connection.php");

// check if session is started
session_start();

// check if user is logged in
if (isset ($_SESSION['user_name'])) {
  // get username from session
  $user_name = $_SESSION['user_name'];
  // $password = $_SESSION['password'];

  // display welcome message and logout link
  echo "<h1>Welcome, $user_name</h1>";
  echo "<a href='logout.php'>Logout</a>";
} else {
  // user not logged in, redirect to login page
  header("Location: login.php");
  exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
</head>
<body>
	<h2>This is home page</h2>
</body>
</html>