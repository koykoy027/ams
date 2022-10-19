
<head>
	<title>Alumni Mangement System</title>

</head>

<?php		
	session_start();
	require 'connection/contact-insert.php';


	if (!isset($_SESSION['email'])){
		require 'header.php';          
	}

	else{
		require 'header1.php';                 
	}
	
	
?>

<body>
	
		<section class="home-section-1">			
			<div class="container">
				<br><br>
				<div class="home-section-1-circle">
				
					
					<h1 class="fs-1 fw-bolder">Welcome <span style="color:#f36601;">Alumni</span></h1>
					<p class="lead fs-4">Easily ensure secure, compliant and highly available web applications</p>
					<!-- <a href="login.php" id="orange" class="btn btn-warning btn-md">LOGIN</a> -->
					
				</div>
			</div>			
		</section>			

		

		<section class="p-5">
			<div class="container">
				<div class="card-group shadow-lg rounded">
				<div class="card p-4">
						<img src="img/required/webpage-65.png" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">Online Admission System</h3>
							<p class="card-text">Software system for automomate the process of student admission in Universitites, Colleges & Schools. Web based application has the ability to calculate based on reservation of seats as per Govt regulations, set up criterias, generate the selection list / merit list in a single click, payment gateway integration etc.</p>
						</div>						
					</div>

					<div class="card p-4">
					<img src="img/required/webpage-67.png" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">Alumni Management System</h3>
							<p class="card-text">Online application software acts as a interactive medium between the old student and the Schools, Colleges, Universities or institutions. Android apps for Alumni Management System comes preloaded with useful features & scopes. Alumni data can be centralized and combined to use it in any future endeavours.</p>
						</div>						
					</div>

					<div class="card p-4">
						<img src="img/required/webpage-71.png" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">Online Newsletter</h3>
							<p class="card-text">Web Based system for personalized promotional HTML email newsletters to prospective buyers / clients. The mails can be templated or customized. The system can track campaigns or individual mails whether they have been received at the intended mail boxes, opened or have been bounced etc and empowered with cron jobs.</p>
						</div>
					</div>
				</div>

				<div class="card-group shadow-lg rounded">
				<div class="card p-4">
						<img src="img/required/webpage-72.jpg" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">School College ERP System</h3>
							<p class="card-text">ERP is a component wise combined software system to automate schools, colleges or universities. Software modules can be added on for fees collections, online admission, staff attendance, library management, students promotion and online education support, id card generation or online examination systems.</p>
						</div>						
					</div>

					<div class="card p-4">
					<img src="img/required/webpage-73.jpg" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">Dynamic Websites</h3>
							<p class="card-text">Webtiative Content Management System (CMS) enables you to build and design resourceful websites at ease. This is an PHP & My Sql based best CMS platform to develop websites. Many modules can be integrated as addon. System is capable of Meta Contents, Sitemap, Keyword Entries for promotion in Search Engines.</p>
						</div>						
					</div>

					<div class="card p-4">
						<img src="img/required/webpage-66.png" class="card-img-top" alt="...">
						<div class="card-body text-center">
							<h3 class="card-title">University Schedule & Appointment System</h3>
							<p class="card-text">This web-based application is a platform for the patients and the doctors to come in contact with a user-friendly interface. The system can serve any medical clinic, multi-specialty hospital or a healthcare center with customized modules for specific needs. Digital prescriptions & Online payments (Doctors fees) enabled.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="p-5" style="background-image: linear-gradient(to top,#ffc266, #ffd699, #ffebcc);">
			<div class="container">
				<h1>Services</h1>
				<p class="lead"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,dolore magna aliqua. Ut enim ad minim veniam, </p>
				<div class="row">
					<div class="col-sm">
					
						<div class="card shadow-lg">
						<img src="img/required/customer-retention.png" class="card-img-top" alt="..." >
						
						<div class="card-body">
							<h5 class="card-title">Highest Customer Retention Rate in the Industry</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card shadow-lg">
						<img src="img/required/certified.png" class="card-img-top" alt="..." >
						<div class="card-body">
							<h5 class="card-title">Certified, Trained & Highly experienced Technicians</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card shadow-lg">
						<img src="img/required/call-support.png" class="card-img-top" alt="..." >
						<div class="card-body">
							<h5 class="card-title"> Instant 24×7 Call Support</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
						</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card shadow-lg">
						<img src="img/required/sample_pic.png" class="card-img-top" alt="..." >
						<div class="card-body">
							<h5 class="card-title">Your Chartered Support Team</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						</div>
						</div>
					</div>
				</div>
				<div class="mt-5">
					<h5>Features of the Online Alumni System</h5>
					<p class="lead"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,dolore magna aliqua. Ut enim ad minim veniam, </p>

					<div class="row p-3">
						<div class="col-sm">							
							<ul type="none">
								<li><i class="fa-solid fa-circle-dot"></i> Easy to use</li>
								<li><i class="fa-solid fa-circle-dot"></i> Easy to integrate with the existing website</li>
								<li><i class="fa-solid fa-circle-dot"></i> Simple registration process for the Alumni</li>
								<li><i class="fa-solid fa-circle-dot"></i> Admin / Moderator approval option</li>
								<li><i class="fa-solid fa-circle-dot"></i> Registered alumni can edit text, images</li>
								<li><i class="fa-solid fa-circle-dot"></i> Admin option to edit / delete / register new alumni</li>
							</ul>
								
								
							</ul>
							
						</div>

						<div class="col-sm">
							
							<ul type="none">
								<li><i class="fa-solid fa-circle-dot"></i> Option to upload image files</li>
								<li><i class="fa-solid fa-circle-dot"></i> Enrolled member list display in the systems</li>
								<li><i class="fa-solid fa-circle-dot"></i> Search option of alumni</li>
								<li><i class="fa-solid fa-circle-dot"></i> Form mail based communication method between the alumni</li>
								<li><i class="fa-solid fa-circle-dot"></i> Admin option to send common mailer to all alumni</li>
								
							
						</div>
					</div>
				</div>
				
			</div>
		</section>


		


















		

	
		<section class="home-section-3">
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

								<!-- <div class="alert alert-success" role="alert" id="alert">
									Email send successfully!
								</div> -->

								<input type="submit" class="btn btn-default btn-md" id="orange" name="submit"></input>

							</form>
						</div>
					</div>

					<div class="col-md">
						

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
		</section>
			
			<section class="home-section-4">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.25617686972!2d121.02871485070455!3d14.754592077188665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1cc9c9c83e9%3A0x303a03298da24ddb!2sUniversity%20of%20Caloocan%20City%20-%20Congressional%20Campus!5e0!3m2!1sen!2sph!4v1644400671349!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>				

			</section>

			
			
		



		<?php
			include 'footer.php';
		?>
		
	
	
</body>