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
		background: url('img/background image/alumni connect.png');
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
						<table class="table table-borderless align-middle table-hover">
							<thead style="background:none;">
								<tr>
									<th>Name</th>
									<th>Current job</th>
									<th>Batch</th>
								</tr>
							</thead>
							<tbody style="background:none;">

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
										<tr>
											<td>

												<div class="d-flex align-items-center">
													<a title="Visit: <?= $row['firstname']; ?> <?= $row['lastname']; ?>" id="default-a" target="_blank" href='visit profile.php?id=<?php echo $row['id'] ?>'>
														<!-- <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width:45px; height:45px;" class="rounded-circle"> -->
														<img src="img/user-profile/<?= $row['profile_picture']; ?>" style="width:45px; height:45px;" class="rounded-circle">
													</a>

													<div class="ms-3">
														<a title="Visit: <?= $row['firstname']; ?> <?= $row['lastname']; ?>" id="default-a" target="_blank" href='visit profile.php?id=<?php echo $row['id'] ?>'>
															<p class="fw-bold mb-1">

																<!-- <i class="fa-solid fa-circle" title="Looking for job" style="color:green;font-size: xx-small;"></i> -->
																<?= $row['firstname']; ?> <?= $row['lastname']; ?>

																<?php
																if ($row['job_status'] == 'searching') {
																	echo '<i class="fa-solid fa-circle" title="Looking for Emplyoee" style="color:red;font-size: xx-small;"></i>';
																} elseif ($row['job_status'] == 'true') {
																	echo '<i class="fa-solid fa-circle" title="Looking for a new job" style="color:green;font-size: xx-small;"></i>';
																}
																?>
															</p>

														</a>
														<a class="text-muted mb-0" id="default-a" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?= $row['email']; ?>" title="<?= $row['firstname']; ?> <?= $row['lastname']; ?>" target="_blank">
															<?= $row['email']; ?>

														</a>
													</div>
												</div>
											</td>
											<td>
												<div class="ms-0">
													<p class="fw-bold mb-1">

														<?= $row['current_job']; ?>
													</p>

													<p class="text-muted mb-0">
														<?= $row['current_company']; ?>
													</p>
												</div>
											</td>
											<td><?= $row['year_graduate']; ?></td>
										</tr>
									<?php
									}
								} else {
									?>
									<tr>
										<td colspan="6">No record found</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<hr>

					</div>


					<!--  -->
				</div>
			</div>
		</section>

	</main>
	<!-- Footer-->
	<?php
	require 'footer.php';
	?>

</body>