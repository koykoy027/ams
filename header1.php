<?php
	// session_start();
	error_reporting(0);
		
	
	
	
?>
	<link rel="icon" href="img/AMS Logo.png" type="image/x-icon">
	<link rel="stylesheet" href="css/fontawesome-free-6.0.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.3-dist/css/bootstrap.css">	 -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



	<!-- DELTE -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />        
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>    

<body>

<nav class="navbar navbar-expand-xl navbar-light bg-light sticky-xl-top" style="border-bottom: 2px solid #f36601;">
  <div class="container">
    <a id="footer-branding" class="navbar-brand " href="index.php"  data-bs-toggle="tooltip" data-bs-placement="top" title="Alumni Management System"><i class="fa-solid fa-user-graduate"></i> AMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- <li class="nav-item me-5">
          <a class="nav-link me-5"></a>		  
        </li> -->

		<div class="me-5">
			<div class="me-5">				
			</div>
		</div>

		<li class="nav-item">
          
		  <a href="appointment.php" class="nav-link"><i class="fa-solid fa-calendar-check"></i> Appointment</a>
        </li>

		<li class="nav-item">
		<a href="Alumni.php" class="nav-link"><i class="fa-solid fa-user-graduate"></i> Alumni students</a>
        </li>

		<li class="nav-item">
		<a href="About us.php" class="nav-link"><i class="fa-solid fa-address-card"></i> About us</a>
        </li>

		<li class="nav-item">
		<a href="Contact us.php" class="nav-link"><i class="fa-solid fa-address-book"></i> Contact</a>			
        </li>
		
      </ul>
      	
	  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		  <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  <i class="fas fa-user me-2"></i><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?>
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="login.php"><i class="fas fa-user me-2"></i>Profile</a></a></li>	
					<li><a class="dropdown-item" href="request appointment.php"><i class="fa-solid fa-calendar-check"></i> Appointment</a></a></li>						
					<li><a class="dropdown-item" href="registered alumni.php"><i class="fa-solid fa-users"></i> Alumni Connect</a></a></li>						
					<li><a class="dropdown-item" href="profile-update.php"><i class="fa-solid fa-wrench"></i> Settings</a></a></li>	
					<li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></a></li>						
				</ul>
			</li>
		</ul>
                
	</div>
  </div>
</nav>
</body>

