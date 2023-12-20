<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiveform3";

$conn = mysqli_connect($servername, $username, $password ,$dbname);

if($conn)
{
	//echo "Connetion done";
}
else{
	echo "Connetion failed".mysqli_connect_error();
	// die("Connection failed: " . mysqli_connect_error());
}
?>



