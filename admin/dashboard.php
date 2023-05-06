<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
	<link rel="stylesheet" href="asset/style.css">
	<!-- My CSS -->

	<link rel="icon" type="png" href="asset/img/branding.png" />
	<title>Alumni Locator Management System - Dashboard</title>
</head>

<body>
	<?php
	require '../connection/config.php';
	session_start();
	if (!isset($_SESSION['email'])) {
		header("Location: index.php");
	}

	$sqlUsers = "SELECT id FROM users";
	$query_run = mysqli_query($conn, $sqlUsers);
	$users = mysqli_num_rows($query_run);

	$sqlAlumni = "SELECT id FROM student";
	$query_run = mysqli_query($conn, $sqlAlumni);
	$alumni = mysqli_num_rows($query_run);

	$sqlEmail = "SELECT id FROM contacts";
	$query_run = mysqli_query($conn, $sqlEmail);
	$email = mysqli_num_rows($query_run);
	?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="dashboard.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Alumni Locator Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="users.php">
					<i class='bx bxs-group'></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="alumni students.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Alumni Students</span>
				</a>
			</li>

			<li>
				<a href="email.php">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Email</span>
				</a>
			</li>
			<li>
				<a href="event.php">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Event Posts</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="team.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Team</span>
				</a>
			</li>
			<li>
				<a href="" class="logout" data-bs-toggle="modal" data-bs-target="#logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>

				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button> -->
				</div>
			</form>
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->

			<li class="nav-item dropdown">
				<a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="asset/img/avatar/<?php echo $_SESSION['avatar']; ?>" class="rounded-circle" height="30px">
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
				</ul>
			</li>

		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<div class="box-info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3><?php echo $alumni; ?></h3>
						<p>Total Alumni</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3><?php echo $users; ?></h3>
						<p>Total Users</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">
						<h3><?php echo $email; ?></h3>
						<p>Total Email</p>
					</span>
				</li>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent users</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT * FROM users ORDER BY created_at DESC LIMIT 5";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $row) {
							?>
									<tr>
										<td>
											<img src="../img/user-profile/<?= $row['profile_picture']; ?>" style="width:45px; height:45px;" class="rounded-circle">
											<p><?= $row['firstname']; ?> <?= $row['lastname']; ?></p>
										</td>
										<td>
											<p><?= $row['email']; ?></p>
										</td>
										<td>
											<p>
												<?php
												if ($row['job_status'] == 'Part Time') {
												?>
													<span class="status completed">Part Time</span>
												<?php
												} else {
												?>
													<span class="status pending">Full Time</span>
												<?php
												}
												?>
											</p>
										</td>
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
				</div>

				<div class="order">
					<div class="head">
						<h3>Meet The Team</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Status</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT * FROM admins LIMIT 5";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $row) {
							?>
									<tr>
										<td>
											<img src="asset/img/avatar/<?= $row['avatar']; ?>" style="width:45px; height:45px;" class="rounded-circle">
											<p>
												<?= $row['firstname']; ?> <?= $row['lastname']; ?>
											</p>
										</td>
										<td><?= $row['email']; ?></td>
										<td>
											<p>
												<?php
												if ($row['status'] == '1') {
												?>
													<span class="status completed">Active</span>
												<?php
												} else {
												?>
													<span class="status pending">Inactive</span>
												<?php
												}
												?>
											</p>
										</td>
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
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<!-- Modal -->
	<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h6 class="modal-title fs-5" id="logoutLabel">Logout session</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Do you really want to leave and logout? All the unsaved changes will be lost.</p>
					<br>


					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-block mx-1" data-bs-dismiss="modal">No, Cancel</button>
						<a href="logout.php" type="button" class="btn btn-primary btn-block mx-1">Yes, Logout</a>
					</div>



				</div>

			</div>
		</div>
	</div>


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script src="asset/script.js"></script>
</body>

</html>