

<?php 
  
require 'connection/config.php';

session_start();
error_reporting(0);

if (isset($_SESSION['email'])){
    header("Location: profile.php");
}



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		// $_SESSION['password'] = $row['password'];
		$_SESSION['profile_picture'] = $row['profile_picture'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['student_number'] = $row['student_number'];
		$_SESSION['birthdate'] = $row['birthdate'];

		$_SESSION['phone_number'] = $row['phone_number'];
		$_SESSION['home_address'] = $row['home_address'];
		$_SESSION['year_graduate'] = $row['year_graduate'];
		$_SESSION['course'] = $row['course'];

		$_SESSION['facebook'] = $row['facebook'];
		$_SESSION['instagram'] = $row['instagram'];
		$_SESSION['personal_website'] = $row['personal_website'];

		$_SESSION['tertiary'] = $row['tertiary'];
		$_SESSION['secondary'] = $row['secondary'];
		$_SESSION['primary_'] = $row['primary_'];
		$_SESSION['bio'] = $row['bio'];
		$_SESSION['current_job'] = $row['current_job'];
		$_SESSION['current_company'] = $row['current_company'];
		$_SESSION['job_status'] = $row['job_status'];

		

		header("Location: profile.php");
		
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/AMS Logo.png" type="image/x-icon">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-for-login.css">

	<title>AMS | LOGIN</title>
</head>
<body>



	<div class="container">
		<form action="" method="POST" class="login-email">
			
			
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>							
			</div>

			<div>
				<small><a href="">Forgot password</a></small>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>