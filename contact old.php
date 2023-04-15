<head>
	<title>AMS | Contact us</title>

	
</head>

	<?php
	session_start();
	// require 'connection/contact-insert.php';
	require 'connection/config.php';
	
	if (!isset($_SESSION['email'])){
		require 'header.php';                 
	}

	else{
		require 'header1.php';                 
	}





	if(isset($_POST['submit'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (firstname, lastname, email, message) VALUES ('$firstname', '$lastname', '$email', '$message')";

        $conn->query($sql) or die ($conn->error);

        

		echo '<script type="text/javascript">toastr.success("Please wait for our respond within 24hrs", "Sent Success!")</script>';
		
		


		

    }
	

	?>



	<div class="contact-us-body">
		<br>
	<br>
	<br>
		<div class="container">
				<div class="row">
					<div class="col-md">
						<div class="shadow-lg p-5 mb-5 bg-body rounded">
						
							<h1>Get in <span style="color:#f36601;">Touch</span></h1>						
							<p class="lead">
								Please fill out the quick form and we will be in touch withs lightning speed.
							</p>
							<form action="" method="post">
								<div class="input-group mb-4 mt-4">									
								  	<input type="text" aria-label="First name" class="form-control" placeholder="First name" name="firstname" required>
								  	<input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lastname" required>
								</div>

								<div class="mb-3">									
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" name="email" required>
									<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
								</div>

								<!-- <label for="floatingTextarea" class="form-label">Message</label> -->
								<div class="form-floating">														
									<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 25%;" name="message" maxlength="500" required></textarea>
									<label for="floatingTextarea">Share your ideas to us...</label>
								</div>															
								<br>
								

								<input type="submit" class="btn btn-default btn-md" id="orange" name="submit"></input>

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
	
			
			