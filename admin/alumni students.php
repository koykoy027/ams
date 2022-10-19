<head>
    <link rel="icon" href="../img/AMS Logo.png">
    <link rel="stylesheet" href="../css/fontawesome-free-6.0.0-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />        
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>    
    <link rel="stylesheet" href="styles.css" />
    
 


    
    <title>
        AMS Admin Dashboard
    </title>
</head>
    
    



<?php
    require '../connection/config.php'; 
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");                
}

    $query = "SELECT id FROM student";
    $query_run = mysqli_query($conn, $query);
    $num = mysqli_num_rows($query_run);


    $bscs3a = "SELECT id FROM student WHERE COURSE = 'BSCS'";
    $bscs3a_run = mysqli_query($conn, $bscs3a);
    $bscs3aCount = mysqli_num_rows($bscs3a_run);

    $bscs3b = "SELECT id FROM student WHERE COURSE = 'BSIT'";
    $bscs3b_run = mysqli_query($conn, $bscs3b);
    $bscs3bCount = mysqli_num_rows($bscs3b_run);

    $bscs3c = "SELECT id FROM student WHERE COURSE = 'BSIS'";
    $bscs3c_run = mysqli_query($conn, $bscs3c);
    $bscs3cCount = mysqli_num_rows($bscs3c_run);

    $bscs3d = "SELECT id FROM student WHERE COURSE = 'BSEMC'";
    $bscs3d_run = mysqli_query($conn, $bscs3d);
    $bscs3dCount = mysqli_num_rows($bscs3d_run);

    // increment
    $i = 1;

    

    

    

?>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Alumni mangement system</div>
            <div class="list-group list-group-flush my-3">
                <a href="" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>                
                <a href="alumni students.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-chart-line me-2"></i>Alumni Students</a>
                <a href="registered alumni.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Registered alumni Students</a>
                <a href="email.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>E-mail</a>
                <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold" href id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i 
                        class="fas fa-paperclip me-2"></i>Appointment</a>
                    
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="list-group-item list-group-item-action bg-transparent second-text fw-bold" href="appointment.php">Pending</a></li>
                        <li><a class="list-group-item list-group-item-action bg-transparent second-text fw-bold" href="completed.php">Completed</a></li>                        
                    </ul>
                <a href="merchandise.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Merchandise</a>
                <a href="schedule.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Schedule</a>
                
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>AMS Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li> -->
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-2"><?php echo $num;?></h3>
                                <p class="fs-5">Total Alumni Students</p>
                            </div>
                            
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                </div> <!-- END OF ROW -->

                <div class="row g-3 my-">
                <div class="col-md">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-2"><?php echo $bscs3aCount;?></h3>
                                <p class="fs-5">BS Computer Science</p>
                            </div>
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-2"><?php echo $bscs3bCount;?></h3>
                                <p class="fs-5">BS Information Technology</p>
                            </div>
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                            <h3 class="fs-2"><?php echo $bscs3cCount;?></h3>
                                <p class="fs-5">BS Information System</p>
                            </div>
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                            
                            <h3 class="fs-2"><?php echo $bscs3dCount;?></h3>
                                <p class="fs-5">BS EMC</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>



        <div class="row my-5">
            <h3 class="fs-4 mb-3">Alumni student List</h3>            		

		<div class="overflow-hidden">	
			<hr>					
            <table class="table table-borderless align-middle table-hover">
				<thead>
					<tr>
                                                                    
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>						
                        <th>Studentnumber</th>
						<th>Course</th>                
                        <th>Section</th>            
						<th>Batch</th>
                        
                        
                        						
					</tr>					
				</thead>

				<tbody>
					<?php
						
						$query = "SELECT * FROM student ORDER BY LAST_NAME DESC";
						$query_run = mysqli_query($conn, $query);

						if(mysqli_num_rows($query_run) > 0){                            
							foreach($query_run as $row){
								?>
									<tr>
                                        
                                    <td><?=$row['LAST_NAME'];?></td>                                    	
									<td><?=$row['FIRST_NAME'];?>
									<td><?=$row['MIDDLE_NAME'];?> </td>	
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
		</div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable()
        
        


    });


    </script>

</body>

</html>