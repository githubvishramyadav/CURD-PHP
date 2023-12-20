<?php
// check if session is started
session_start();
// include database connection file
include("connection.php");

// destroy session and redirect to login page
session_destroy();
header("Location: login.php");
exit();
?>
