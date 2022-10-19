<head>
	<title>AMS | Alumni Records</title>
</head>
<?php	
	session_start();
	require 'connection/config.php';
	
	if (!isset($_SESSION['email'])){
		require 'header.php';                 
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
<section class="mb-5" style="background: url('https://raw.githubusercontent.com/JulianLaval/canvas-particle-network/master/img/demo-bg.jpg'); background-repeat: no-repeat; background-size: cover;background-position: bottom: auto; border-bottom: 2px solid #f36601;">
	<div class="container">	
		<div class="home-section-1-circle">					
			<h1 class="fs-1 fw-bolder">Alumni<span style="color:#f36601;"> Student</span></h1>
			<p class="lead fs-6">
				From 2019 - 2021 CSD Graduates of University of Caloocan city will be display here.
			</p>		
		</div>
	</div>
</section>
<div class="container">
	<h3>Alumni List</h3>
		<div class="overflow-hidden">	
		<hr>			
		<table class="table table-borderless align-middle table-hover">		
			<thead style="background:none;">
					<tr>						
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Middlename</th>                        
						<th>Student Number</th>
						<th>Course</th>
						<th>Section</th>
						<th>Batch Year</th>												
					</tr>					
				</thead>
				<tbody style="background:none;">
					<?php																	
						$query = "SELECT * FROM student";
						$query_run = mysqli_query($conn, $query);
						if(mysqli_num_rows($query_run) > 0){
							foreach($query_run as $row){
								?>
									<tr>										
										<td><?=$row['LAST_NAME'];?></td>                                    	
										<td><?=$row['FIRST_NAME'];?>
										<td> <?=$row['MIDDLE_NAME'];?> </td>	
										<td><?=$row['STUDENT_NUMBER'];?></td>
										<td><?=$row['COURSE'];?></td>
										<td><?=$row['SECTION'];?></td>
										<td><?=$row['YEAR_GRADUATE'];?></td>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable()        
    });

</script>
		</div>	
	</div>
<?php		
	require 'footer.php';
?>		