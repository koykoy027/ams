<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="asset/app.css">
	<link rel="icon" type="png" href="asset/img/branding.png" />
	<title>Alumni Locator Management System - Login</title>
</head>

<body style="background: #ccc;">
	<?php
	include '../connection/config.php';
	session_start();
	error_reporting(0);
	if (isset($_SESSION['email'])) {
		header("Location: dashboard.php");
	}
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['email'] = $row['email'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['avatar'] = $row['avatar'];
			header("Location: dashboard.php");
		} else {
			echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		}
	}

	?>
	<div class="container">
		<form action="" method="POST" class="login-email">

			<p class="login-text" style="font-size: 2rem; font-weight: 800;">AMS Admin</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>

			<center>
				<a class="text-center" href="../">Go Back to Website</a>
			</center>


		</form>
	</div>
</body>

</html>