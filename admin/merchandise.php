<head>
    <link rel="icon" href="../img/AMS Logo.png">
    <link rel="stylesheet" href="../css/fontawesome-free-6.0.0-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />    
    <link rel="icon" href="../img/AMS Logo.png">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>    
    <link rel="stylesheet" href="styles.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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

        if(isset($_GET['id'])){

            $id_name = $_GET['id'];
            
            // echo $_GET['id'];                        
            $asd = "UPDATE id_application SET status= 'done' WHERE id = $id_name";
            $message = $conn->query($asd) or die ($conn->error);
            header("Location: merchandise.php");
            die();
            
        }

        


        


        if(isset($_GET['pending'])){
            $sql = "SELECT * FROM id_application WHERE status='pending' ORDER BY date_issue ASC";
            
        }

        elseif(isset($_GET['done'])){
            $sql = "SELECT * FROM id_application WHERE status='done' ORDER BY date_issue ASC";
            
        }

        elseif(isset($_GET['clear'])){
            $sql = "SELECT * FROM id_application ORDER BY date_issue ASC";                
        }

        else{
            $sql = "SELECT * FROM id_application WHERE status='pending' ORDER BY date_issue ASC";
        }

        // DISPLAY OF ROWS            
        $message = $conn->query($sql) or die ($conn->error);
        $row = $message->fetch_assoc();

        // NUMBER OF ROWS
        $qry = "SELECT * FROM id_application";
        $qry_run = mysqli_query($conn, $qry);
        $num = mysqli_num_rows($qry_run);

        $pending = "SELECT * FROM id_application WHERE status='pending'";
        $pending_run = mysqli_query($conn, $pending);
        $num_pending = mysqli_num_rows($pending_run);

        $done = "SELECT * FROM id_application WHERE status='done'";
        $done_run = mysqli_query($conn, $done);
        $num_done = mysqli_num_rows($done_run);

        




        //increment
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
                <a href="alumni students.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                <a href="merchandise.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                                <p class="fs-5">Total ID Application</p>
                            </div>
                            
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $num_pending;?></h3>
                                <p class="fs-5">Total Pending</p>
                            </div>
                            
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $num_done;?></h3>
                                <p class="fs-5">Total Mark as Done</p>
                            </div>
                            
                            <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>                    
                </div>
                

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Alumni ID Application</h3>

                    <h4 class="fw-bold fs-5">Filter</h4>


		<form action="" method="GET">
		

			<div class="row">
				<div class="col-md">
                    <input type="submit" class="btn btn-outline-secondary btn-block" value="Show all" name="clear">	
                    <input type="submit" class="btn btn-outline-success btn-block" value="Show pending" name="pending">
					<input type="submit" class="btn btn-outline-danger btn-block" value="Mark as done" name="done">
					
				</div>
				
			</div>
		</form>
                    <div class="overflow-hidden">	
			<hr>					
            <table class="table table-borderless align-middle table-hover">
				<thead>
                                <tr>
                                                                     
                                    
                                    <th scope="col">Name</th>                                    
                                    <th scope="col">Student number</th>                                    
                                    <th scope="col">Course</th>
                                    <th scope="col">Batch Year</th>
                                    <th scope="col">Date issue</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                            <?php do{ 

                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">												
											<div class="ms-0">
												<p class="fw-bold mb-1">
                                                    <?=$row['firstname'];?> <?=$row['lastname'];?>
												</p>
												<a class="text-muted mb-0" id="default-a" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?=$row['email'];?>" title="<?=$row['firstname'];?> <?=$row['lastname'];?>"  target="_blank">
													<?=$row['email'];?>
												</a>
											</div>
										</div>
                                    </td>
                                
                                    <td scope="row"><?php echo $row['student_number'];?></td>
                                    <td scope="row"><?php echo $row['course'];?></td>
                                    <td scope="row"><?php echo $row['year_graduate'];?></td>
                                    <td scope="row"><?php echo $row['date_issue'];?></td>
                                    <td scope="row">
                                    
                                        <a title="Completed" href='merchandise.php?id=<?php echo $row['id']?>' name="complete" class="btn btn-outline-success btn-block"><i class="fa-solid fa-check"></i> Mark as Done</a>
                                    </td>                                                                        
                                </tr>

                                <?php }while($row = $message->fetch_assoc())?>

                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable();

    });
    </script>
</body>

</html>