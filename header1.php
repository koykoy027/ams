<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link rel="icon" type="png" href="assets/img/branding.png" />
	<!-- Bootstrap icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="assets/css/styles.css" rel="stylesheet" />
</head>

<?php
// session_start();
error_reporting(0);
?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container px-5">
		<a class="navbar-brand" href="index.php">ALUMNI LOCATOR</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
				<li class="nav-item"><a class="nav-link" href="alumni.php">ALUMNI STUDENTS</a></li>
				<li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
				<li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
				<li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
				<li class="nav-item"><a class="nav-link" href="alumni connect.php">ALUMNI CONNECT</a></li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-uppercase active" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?></a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
						<li><a class="dropdown-item" href="login.php">Profile</a></li>
						<li><a class="dropdown-item" href="profile-update.php">Account settings</a></li>
						<li><a class="dropdown-item" href="logout.php">Logout</a></li>
					</ul>
				</li>


			</ul>
		</div>
	</div>
</nav>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="assets/js/scripts.js"></script>


</html>