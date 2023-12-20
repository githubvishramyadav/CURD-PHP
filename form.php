<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>CURD Operation</title>
</head>

<body>
	<div class="container">
		<form action="#" method="POST">
			<div class="title">
				Registration Form
			</div>
			<div class="form">
				<div class="input_field">
					<label for="">Full Name</label>
					<input type="text" class="input" name="fname">
				</div>
				<div class="input_field">
					<label for="">User Name:</label>
					<input type="text" class="input" name="user_name">
				</div>
				<div class="input_field">
					<label for="">Password</label>
					<input type="password" class="input" name="password">
				</div>
				<div class="input_field">
					<label for=""> Confirm Password</label>
					<input type="password" class="input" name="conpassword">
				</div>
				<div class="input_field">
					<label for="">Gender</label>
					<div class="custom_select">
						<select name="gender" id="">
							<option value="Not Selected">-- Select --</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>
				<div class="input_field">
					<label for=""> Email</label>
					<input type="email" class="input" name="email">
				</div>
				<div class="input_field">
					<label for="">Phone</label>
					<input type="text" class="input" name="phone">
				</div>
				<div class="input_field">
					<label for="">Address</label>
					<textarea name="address" id="" class="textarea" cols="19" rows="3"></textarea>
				</div>
				<!-- <div class="input_field terms">
				<label for="" class="check">
					<input type="checkbox">
					<span class="checkmark"></span>
				</label>
				<p>Agree to term and conditions</p>
			</div> -->
				<div class="input_field">
					<input type="submit" value="submit" class="btn" name="submit">
				</div>
				<div class="input_field">
					<p class="text-center mt-3">I have an Account. <a href="login.php" class="btn">Log In</a></p>
				</div>

			</div>
		</form>
	</div>
</body>

</html>




<?php
if (isset($_POST['submit'])) {
	$fname      = $_POST['fname'];
	$user_name  = $_POST['user_name'];
	$pwd        = $_POST['password'];
	$cpwd       = $_POST['conpassword'];
	$gender     = $_POST['gender'];
	$email      = $_POST['email'];
	$phone      = $_POST['phone'];
	$address    = $_POST['address'];


		// can't empty
		if ($fname != "" && $user_name != "" && $pwd != "" && $gender != "" && $email != "" && $phone != "" && $address != "") {
			if ($pwd == $cpwd) {

				$hashpwd = md5($pwd);
				$hashcpwd = md5($cpwd);
			$query = "INSERT INTO form values('$fname','$user_name','$hashpwd','$hashcpwd','$gender','$email','$phone','$address')";

			$data = mysqli_query($conn, $query);
			if ($data) {
				echo "<script>alert('Data Inserted into database')</script>";
			} else {
				echo "Failed";
			}
		}else{
			echo "<script>alert('Password not matched')</script>";
		}
	} else {
		// echo "Fields are empty fill the form";
		echo "<script>alert('Fill the form first')</script>";
	}
}
?>