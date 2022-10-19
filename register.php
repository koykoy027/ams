

<?php 

include 'connection/config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$phone_number = $_POST['phone_number'];


	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (lastname,firstname, email, password, phone_number, tertiary)
					VALUES ('$lastname','$firstname', '$email', '$password', '$phone_number', 'University of Caloocan City')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				
				$lastname = "";
				$firstname = "";
				$email = "";
				$phone_number = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}


			
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="img/AMS Logo.png" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="css/style-for-login.css">

	<title>AMS | Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">			

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname; ?>" required>
				
				
			</div>
			<div class="input-group">
				<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname; ?>" required>
				
			</div>
			
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Phone number" minlength="11" maxlength=11 name="phone_number" value="<?php echo $_POST['phone_number']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text text-center">Have an account? <a class="text-center" href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>