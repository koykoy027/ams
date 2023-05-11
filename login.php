<title>
	Login - Alumni Locator Management System
</title>

<?php
require 'header.php';
require 'connection/config.php';

session_start();
error_reporting(0);

if (isset($_SESSION['email'])) {
	header("Location: profile.php");
}

$message = '';
$messageAlert = '';

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
		$_SESSION['birthday'] = $row['birthday'];

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

		$message = 'Congratulations! You have successfully logged in to your account. Welcome back!';
		$messageAlert = 'success';
		header("Location: profile.php");
	} else {
		$message = "Were sorry, but we couldnt log you in. Please check your email and password, and try again.";
		$messageAlert = 'danger';
	}
}

?>

<body class="d-flex flex-column bg-light">

	<main class="flex-shrink-0">
		<!-- Login section-->
		<section class="py-5">
			<div class="container px-5 my-5">
				<div class="text-center mb-5">
					<h1 class="fw-bolder">LOGIN TO CONTINUE</h1>
					<p class="text-sm fw-normal text-muted mb-0">TO FULLY ACCESSED ALUMNI LOCATOR!</p>
				</div>
				<div class="row gx-5 justify-content-center">
					<!-- Login card pro-->
					<div class="col-lg-8 col-xl-6">
						<div class="card mb-5 mb-xl-0">
							<div class="card-body p-5">
								<form action="" method="POST" class="login-email">
									<div class="row mb-3">
										<?php if (!empty($message)) : ?>
											<div class="alert alert-<?php echo $messageAlert; ?> alert-dismissible" role="alert">
												<?php echo $message; ?>
											</div>
										<?php endif; ?>

									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="email" name="email" type="email" placeholder="Email address" required value="<?php echo $email; ?>" />
										<label for="email">Email address</label>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="password" name="password" type="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required />
										<label for="password">Password</label>
									</div>

									<div class="d-grid">
										<button name="submit" class="btn btn-primary">Sign in</button>
										<span class="mt-3">
											Don't have account yet?
											<a href="register.php">Register here</a>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>










	<?php
	require 'footer.php';
	?>
</body>