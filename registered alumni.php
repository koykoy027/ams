


<head>
	
	<title>AMS | Registered Alumni</title>

	

</head>
<?php
	session_start();
	require 'connection/config.php';
	
	
	if (!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	else{
		require 'header1.php';
	}

?>

	<style>
		td, th{
			font-size: small;
		}				
	</style>

	
 


 <section style="background: url('https://raw.githubusercontent.com/JulianLaval/canvas-particle-network/master/img/demo-bg.jpg'); background-repeat: no-repeat; background-size: cover;background-position: bottom: auto; border-bottom: 2px solid #f36601;">
	<div class="container">	
		<div class="home-section-1-circle">					
			<h1 class="fs-1 fw-bolder">Alumni<span style="color:#f36601;"> Connect</span></h1>
			<p class="lead fs-5">
				Registered Alumni are the people who created account thru portal, to have access in alumni connect and interact with fellow alumnus.					
			</p>		
		</div>
	</div>
</section>



<div class="main-body">
	<div class="container">

	


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





	</div>
</div>

<div class="container">

		<div class="overflow-hidden">	
			<hr>		
			<table class="table table-borderless align-middle table-hover">
				<thead style="background:none;">
					<tr>
						<th>Name</th>
						<th>Current job</th>
						<th>Personal Skills</th>													       												
						<th>Contact</th> 
						
						<th>Course</th>	
						<th>Batch</th>
						<th>Location</th> 
						
					</tr>					
				</thead>                
				<tbody style="background:none;">

					<?php

						if(isset($_GET['job_searching'])){
							$query = "SELECT * FROM users WHERE job_status ='true' ORDER BY firstname ASC";
							
						}

						elseif(isset($_GET['employee_searching'])){
							$query = "SELECT * FROM users WHERE job_status ='searching' ORDER BY firstname ASC";
							
						}

						elseif(isset($_GET['clear'])){
							$query = "SELECT * FROM users ORDER BY firstname ASC";
							
						}

						else{
							$query = "SELECT * FROM users ORDER BY firstname ASC";

						}
						
						
						$query_run = mysqli_query($conn, $query);

						if(mysqli_num_rows($query_run) > 0){

							foreach($query_run as $row){
								?>
									<tr>
										<td>

											<div class="d-flex align-items-center">
												<a title="Visit: <?=$row['firstname'];?> <?=$row['lastname'];?>" id="default-a" target="_blank" href='visit profile.php?id=<?php echo $row['id']?>'>
													<!-- <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width:45px; height:45px;" class="rounded-circle"> -->
													<img src="img/user-profile/<?=$row['profile_picture'];?>" style="width:45px; height:45px;" class="rounded-circle">
												</a>

												<div class="ms-3">
													<a title="Visit: <?=$row['firstname'];?> <?=$row['lastname'];?>" id="default-a" target="_blank" href='visit profile.php?id=<?php echo $row['id']?>'>
														<p class="fw-bold mb-1">

														<!-- <i class="fa-solid fa-circle" title="Looking for job" style="color:green;font-size: xx-small;"></i> -->
														<?=$row['firstname'];?> <?=$row['lastname'];?>

														<?php
															if($row['job_status'] == 'searching'){
																echo '<i class="fa-solid fa-circle" title="Looking for Emplyoee" style="color:red;font-size: xx-small;"></i>';
															}
															elseif($row['job_status'] == 'true'){
																echo '<i class="fa-solid fa-circle" title="Looking for a new job" style="color:green;font-size: xx-small;"></i>';
															}
														?>
														</p>
														
													</a>
													<a class="text-muted mb-0" id="default-a" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?=$row['email'];?>" title="<?=$row['firstname'];?> <?=$row['lastname'];?>"  target="_blank">
														<?=$row['email'];?>

													</a>
												</div>
											</div>
										</td>                                        
										<td>
											<div class="ms-0">
												<p class="fw-bold mb-1">
													
													<?=$row['current_job'];?>
												</p>

												<p class="text-muted mb-0">
													<?=$row['current_company'];?>

												</p>
											</div>
											
										</td>						
										
										<td><?=$row['bio'];?></td> 
										<td>
											<?=$row['phone_number'];?>
											
										</td>	

										
										<td><?=$row['course'];?></td>
										<td><?=$row['year_graduate'];?></td>										
										<td><?=$row['home_address'];?></td>
									</tr>
								<?php
							}
						}
						else {
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

			<!-- <nav class="float-end">
				<ul class="pagination">
					<li class="page-item">
						<span class="page-link">Previous</span>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">
							1
						</a>
					</li>

					<li class="page-item active" aria-current="page">
						<span class="page-link">
							2
						</span>
					</li>

					<li class="page-item">
						<a class="page-link" href="#">
							3
						</a>
					</li>

					<li class="page-item">
						<a class="page-link" href="#">
							Next
						</a>
					</li>

				</ul>
			</nav> -->
		</div>
	</div>
</div>
	
<?php	
	
	require 'footer.php';

?>

		




