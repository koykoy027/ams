<title>
	Alumni connect - Alumni Locator Management System
</title>

<?php
session_start();
require 'connection/config.php';


if (!isset($_SESSION['email'])) {
	header("Location: login.php");
} else {
	require 'header1.php';
}

?>
<style>
	header {
		background: url('assets/img/background image/alumni connect.png');
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		color: #fff;
	}
</style>

<body class="d-flex flex-column">
	<main class="flex-shrink-0">
		<!-- Header-->
		<header class="py-5">
			<div class="container px-5">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-xxl-6">
						<div class="text-center my-5">
							<h1 class="fw-bolder mb-3">Alumni Connect</h1>
							<p class="lead fw-normal mb-4">Our mission is to make Alumni easier to connect to each other.</p>
							<!-- <a class="btn btn-primary btn-lg" href="#scroll-target">List of all user</a> -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- About section one-->


		<section class="py-5 bg-light" id="scroll-target">

			<div class="container px-5 my-5">
				<!-- <div class="main-body">
					<h4 class="fw-bold fs-5">Filter</h4>
					<form action="" method="GET">
						<div class="row">
							<div class="col-md">
								<input type="submit" class="btn btn-outline-success btn-block" value="Job Searching" name="job_searching">
								<input type="submit" class="btn btn-outline-danger btn-block" value="Seeking Employee" name="employee_searching">
								<input type="submit" class="btn btn-outline-secondary btn-block" value="Clear Filter" name="clear">
							</div>

						</div>
					</form>
				</div> -->
				<div class="row gx-5 align-items-center">
					<div class="overflow-hidden">
						<hr>

						<?php
						if (isset($_GET['job_searching'])) {
							$query = "SELECT * FROM users WHERE job_status ='true' ORDER BY firstname ASC";
						} elseif (isset($_GET['employee_searching'])) {
							$query = "SELECT * FROM users WHERE job_status ='searching' ORDER BY firstname ASC";
						} elseif (isset($_GET['clear'])) {
							$query = "SELECT * FROM users ORDER BY firstname ASC";
						} else {
							$query = "SELECT * FROM users ORDER BY firstname ASC";
						}
						$query_run = mysqli_query($conn, $query);

						if (mysqli_num_rows($query_run) > 0) {

							foreach ($query_run as $row) {
						?>

								<div class="card mb-3">
									<div class="card-body">
										<div class="d-flex justify-content-between">
											<div class="d-flex gap-4">
												<img src="assets/img/user-profile/placeholder.png" width="100px" class="rounded-circle">
												<div>
													<h5>
														<?= $row['firstname']; ?> <?= $row['lastname']; ?>
													</h5>
													<a class="text-muted text-decoration-none">
														<?= $row['email']; ?>
													</a>
													<br>
													<small>
														<?= $row['bio']; ?>
													</small>
												</div>
											</div>

											<div class="dropdown text-sm">
												<button class="btn" data-bs-toggle="dropdown" aria-expanded="false">
													:
												</button>
												<ul class="dropdown-menu">
													<li><a class="dropdown-item text-sm" href='visit profile.php?id=<?php echo $row['id'] ?>'>Visit Profile</a></li>
												</ul>
											</div>

										</div>
									</div>
								</div>

							<?php
							}
						} else {
							?>
							<p class="text-center">
								No records found
							</p>
						<?php
						}
						?>

						<hr>
					</div>
				</div>
			</div>
		</section>

	</main>
	<!-- Footer-->
	<?php
	require 'footer.php';
	?>

</body>