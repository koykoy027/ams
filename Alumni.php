<title>
	Home - Alumni Locator Management System
</title>

<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION['email'])) {
	require 'header.php';
} else {
	require 'header1.php';
}


?>
<!-- END OF PHP -->

<body class="d-flex flex-column h-100">
	<main class="flex-shrink-0">
		<!-- Header-->

		<section class="py-5">
			<div class="container px-5 my-5">
				<div class="row gx-5 justify-content-center">
					<div class="col-lg-8 col-xl-6">
						<div class="text-center">
							<h2 class="fw-bolder">ALUMNI STUDENTS</h2>
							<p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
						</div>
					</div>
				</div>
				<div class="table-responsive row gx-5">
					<table class="table table-borderless align-middle table-hover">
						<thead>
							<tr>
								<th>Lastname</th>
								<th>Firstname</th>
								<th>Middlename</th>
								<th>Campus</th>
								<th>Gender</th>
								<th>Program</th>
								<th>Section</th>
								<th>Status</th>
								<th>Batch</th>
							</tr>
						</thead>

						<tbody>
							<?php
							require 'connection/config.php';
							$query = "SELECT * FROM alumnis ORDER BY lastname DESC";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $row) {
							?>
									<tr>
										<td><?= $row['lastname']; ?></td>
										<td><?= $row['firstname']; ?></td>
										<td><?= $row['middlename']; ?></td>
										<td><?= $row['campus']; ?></td>
										<td><?= $row['gender']; ?></td>
										<td><?= $row['program']; ?></td>
										<td><?= $row['section']; ?></td>
										<td><?= $row['status']; ?></td>
										<td><?= $row['batch']; ?></td>
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
		</section>
	</main>
	<!-- Footer-->
	<?php
	require 'footer.php';
	?>

	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />

	<!-- DATATABLES -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.table').DataTable({
				// "dom": 'ftip'
			});

		});
	</script>

</body>