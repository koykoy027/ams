<head>
	<title>AMS | Appointment</title>
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
	

	<section class="appointment-section-1">			
		<div class="container">				
			<div class="home-section-1-circle">					
				<h1 class="fs-1 fw-bolder">How to make <span style="color:#f36601;">Appointment</span></h1>
				<p class="lead fs-4">To make and schedule appointment, You need to register an account.
                    <a href="register.php" id="orange" class="btn btn-default btn-sm">
                        Register
                    </a>
                </p>		
			</div>
		</div>
	</section>

		

	<div class="appointment-body">


	



	<div class="container">
			<br><br>
			
			<br>
			<?php
                    if(isset($_POST['update_sched_data'])){
                        $days = $_POST['days'];
                        $open = $_POST['open'];
                        $close = $_POST['close'];
                        $query = "UPDATE schedule SET open='$open', close='$close' WHERE days='$days'";
                        $query_run = mysqli_query($conn, $query);
                        if($query_run){
                            $_SESSION['status'] = "Data Updated Successfully";
                            header("Location: schedule.php");
                        }
                        else{
                            $_SESSION['status'] = "Not Updated";
                            header("Location: schedule.php");
                        }
                    }
                    ?>
                    <?php
                    $query = "SELECT * FROM schedule";
                    $query_run = mysqli_query($conn, $query);
                
                    if(mysqli_num_rows($query_run) > 0){

                        
?>    <div class="row g-3 my-2">
	<h2>Weekdays Schedule</h2>
    
    <?php
    foreach($query_run as $row){
        ?>        
            <div class="col-sm">
                <div class="card shadow-lg p-3 mb-3 bg-body rounded" style="text-transform:uppercase;">
                    
                    <h3 style="color:#f36601;"><?=$row['days'];?></h3>
                    
                    <?=$row['open'];?> - <?=$row['close'];?>                    
                    <br>					
                </div>                                
            </div>
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

	</div>
			<br><br>


	<div class="container">
		<div class="about-us-section-light">

				<h1>How to make Appointment?</h1>	
				<p class="lead" id="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				</p>
							
				<p class="lead">1. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<p class="lead">2. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<p class="lead">3. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<p class="lead">4. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				<p class="lead">5. Lorem ipsum dolor sit amet consectetur adipisicing <span><a href="request appointment.php" class="btn btn-warning btn-sm" id="acc">LOGIN</a></span></p>
				
			</div>
	</div>
	
	</div>	
		
		<?php
			require 'footer.php';
		?>
	
	
			
			