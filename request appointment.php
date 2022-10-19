<?php   
	session_start();
  
  require 'connection/config.php';

  

  if (!isset($_SESSION['email'])){
	header("Location: login.php");	
}

else{
	require 'header1.php';
}


if(isset($_POST['submit'])){

	
	  $select_option = $_POST['purpose'];
	  $status = "pending";
	  $id_number = "UCC-0000" . $_SESSION['student_number'];
	  $firstname = $_SESSION['firstname'];
	  $lastname = $_SESSION['lastname'];				
	  $email = $_SESSION['email'];
	  $student_number = $_SESSION['student_number'];
	  $course = $_SESSION['course'];
	  $year_graduate = $_SESSION['year_graduate'];
	  $birthdate = $_SESSION['birthdate'];
	  $message = $_POST['message'];

	  


  if($select_option == "" || $student_number == ""){

	echo '<script type="text/javascript">toastr.warning("Something went wrong!", "INVALID ACTION")</script>';	  

  }

  elseif($select_option == "Alumni ID Application"){



	
		$sql = "SELECT * FROM id_application WHERE student_number='$student_number'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$status = "pending";
			$id_number = "UCC-0000" . $_SESSION['student_number'];
			$firstname = $_SESSION['firstname'];
			$lastname = $_SESSION['lastname'];				
			$email = $_SESSION['email'];
			$student_number = $_SESSION['student_number'];
			$course = $_SESSION['course'];
			$year_graduate = $_SESSION['year_graduate'];
			$birthdate = $_SESSION['birthdate'];
			$message = $_POST['message'];
	  
	  
			$sql = "INSERT INTO id_application (status, id_number, firstname, lastname, email, student_number, course, year_graduate, birthdate, message) VALUES ('$status', '$id_number', '$firstname', '$lastname', '$email', '$student_number', '$course', '$year_graduate', '$birthdate', '$message')";	  
			$conn->query($sql) or die ($conn->error);
			echo '<script type="text/javascript">toastr.success("Please wait for our respond within 24hrs", "Sent Success!")</script>';

		}

		else{
			
			echo '<script type="text/javascript">toastr.warning("You already send a request.", "INVALID ACTION")</script>';	  
		}

	


	  
  }

  else{
	  
	  $status = "pending";
	  $firstname = $_SESSION['firstname'];
	  $lastname = $_SESSION['lastname'];		
	  $email = $_SESSION['email'];		
	  $student_number = $_SESSION['student_number'];
	  $select_option = $_POST['purpose'];
	  $message = $_POST['message'];
	  

		  $sql = "INSERT INTO appointment (status, firstname, lastname, purpose, email, student_number, message) VALUES ('$status', '$firstname', '$lastname', '$select_option', '$email', '$student_number', '$message')";

		  $conn->query($sql) or die ($conn->error);
		  echo '<script type="text/javascript">toastr.success("Please wait for our respond within 24hrs", "Sent Success!")</script>';			

  }

  
  
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
		Appointment | 
    <?php echo $_SESSION['firstname']; ?>
    <?php echo $_SESSION['lastname']; ?>
    </title>

</head>	
		<div class="container">
			<br><br><br>
				<div class="row">
					<div class="col-md">
						<div class="shadow-lg p-5 mb-5 bg-body rounded">
						
							<h1>Request<span style="color:#f36601;"> appointment</span></h1>						
							<p class="lead">
								Please fill out the quick form and we will be in touch withs lightning speed.
							</p>
							<form action="" method="post">
								<div class="input-group mb-4 mt-4">									
								  	<input type="text" aria-label="First name" class="form-control" placeholder="First name" name="firstname" required value="<?php echo $_SESSION['firstname']; ?>" disabled>
								  	<input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lastname" required value="<?php echo $_SESSION['lastname']; ?>"disabled>
								</div>

								<div class="mb-3">									
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" name="insert_email" value="<?php echo $_SESSION['email']; ?>" disabled>
									
								</div>

								<div class="mb-3">

								


									<select class="form-select" name="purpose">
									  	<option value="" selected>--Select Purpose--</option>
									  	<option value="Sign of documents">Sign of documents</option>
									  	<option value="Year book">Year book</option>
									  	<option value="Diploma">Diploma</option>
										<option value="Alumni ID Application">Alumni ID Application</option>
									</select>

									<div id="emailHelp" class="form-text">
										<em>
											<span style="color:red">Note: </span>
											Complete all your personal information.
										</em>

									</div>
									
								</div>

								<!-- <label for="floatingTextarea" class="form-label">Message</label> -->
								<div class="form-floating">														
									<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 25%;" name="message" maxlength="500"></textarea>
									<label for="floatingTextarea">Share your ideas to us...</label>
								</div>															
								<br>


								<?php 
                    				if(isset($_SESSION['warning'])){										
								?>
								
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Invalid Action</strong> <?php echo $_SESSION['warning']; ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								
								<?php
								unset($_SESSION['warning']);
							}
							?>

								
							
								<?php 
                    				if(isset($_SESSION['success'])){

								?>
								
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Email sent successfully!</strong> <?php echo $_SESSION['success']; ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								
								<?php
								unset($_SESSION['success']);
							}
							?>



<?php
	
  
  
?>

								<!-- <div class="alert alert-success" role="alert" id="alert">
									Email send successfully!
								</div> -->

								<!-- <input type="submit" class="btn btn-default btn-md" id="orange" name="submit"></input> -->


								<!-- MODAL -->

								<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Submit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><em><span style="color:#f36601;">Personal &nbsp</span></em>Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">		  
		  <!-- CONTENT -->
		  <div class="row">
			  <div class="col-sm-3">
				  <h6 class="mb-0">Full Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<?php echo $_SESSION['firstname']; ?>
					<?php echo $_SESSION['lastname']; ?>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-sm-3">
					<h6 class="mb-0">Student Number</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<?php echo $_SESSION['student_number']; ?>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-sm-3">
					<h6 class="mb-0">Course</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<?php echo $_SESSION['course']; ?>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-sm-3">
					<h6 class="mb-0">Birth date</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<?php echo $_SESSION['birthdate']; ?>
				</div>
			</div>
			<hr>			
			<!-- END OF CONENT -->
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="submit">

		
      </div>
    </div>
  </div>
</div>

<!-- END OF MODAL -->

							</form>



							
						</div>
					</div>

					<div class="col-md">

						<!-- <div id="map-container-google-3" class="z-depth-1-half map-container-3">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.25617686972!2d121.02871485070455!3d14.754592077188665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1cc9c9c83e9%3A0x303a03298da24ddb!2sUniversity%20of%20Caloocan%20City%20-%20Congressional%20Campus!5e0!3m2!1sen!2sph!4v1644400671349!5m2!1sen!2sph" width="100%" height="50%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div> -->
						

						<div class="contact-us-right-float">
							<h3>Contact us</h3>						
						<br>
						<div>
							<h5>
								<i class="fa-solid fa-location-dot" id="orangeLink"></i>
								Congressional Rd Ext, Barangay 171, Caloocan, Metro Manila, Philippines								
							</h5>
							<br>
						</div>

							<a href="https://www.facebook.com/University-of-Caloocan-City-768320169858317">
								<i class="fa-brands fa-facebook" id="orangeLink"> </i> Facebook University of caloocan city
							</a>
							<br><br>
							<a href="https://www.instagram.com/explore/locations/514045192/ucc-congressional-north/">
								<i class="fa-brands fa-instagram" id="orangeLink"></i> Instagram.com/University-of-Caloocan-City
							</a>
							<br><br>

							<a href="https://admin@ucc-caloocan.edu.ph/">
								<i class="fa-solid fa-envelope" id="orangeLink"></i> admin@ucc-caloocan.edu.ph
							</a>
							<br><br>
							<a><i class="fa-solid fa-phone" id="orangeLink"></i> +632-3106581 | +632-3106855</a>
							<br>
						</div>
					</div>
				</div>
			</div>
			<br><br><br><br>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.25617686972!2d121.02871485070455!3d14.754592077188665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1cc9c9c83e9%3A0x303a03298da24ddb!2sUniversity%20of%20Caloocan%20City%20-%20Congressional%20Campus!5e0!3m2!1sen!2sph!4v1644400671349!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>				
		</div>


		

		
		<?php
			require 'footer.php';
		?>
	</div>
	
			
			