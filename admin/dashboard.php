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


 ?>


<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Alumni mangement system</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>                
                <a href="alumni students.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Alumni Students</a>
                <a href="registered alumni.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Registered alumni Students</a>
                <a href="email.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>E-mail</a>
                <a href="appointment.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Appointment</a>
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
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['username']; ?>
                                
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
            <h3 class="fs-3 mb-3">Weekdays Schedule</h3>

            <!-- START EDITING -->
								
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
        <!-- END OF EDITING -->
    </div>
</div>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                <h3 class="fs-4 mb-3">Student records</h3>
                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">73</h3>
                                <p class="fs-5">Total User</p>
                            </div>
                            
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Total Alumni Students</p>
                            </div>
                            <i class="fas fa-graduation-cap fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>



                <div class="row g-3 my-2">
                <h3 class="fs-4 mb-3">Course Total Graduates</h3>
                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">BSCS</h3>
                                <p class="fs-5">465</p>
                            </div>
                            
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">BSIS</h3>
                                <p class="fs-5">346</p>
                            </div>
                            <i class="fas fa-graduation-cap fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">BSIT</h3>
                                    <p class="fs-5">675</p>
                                </div>
                                <i class="fas fa-equals fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>


                        <div class="col-md">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">BSEMC</h3>
                                    <p class="fs-5">380</p>
                                </div>
                                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>


                </div>
                <br>
                <h3 class="fs-4 mb-3">E-mail received</h3>
                <div class="container">
                <div class="row g-3 my-2">
                
                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Request of a softcopy</h3>
                                <p class="fs-5">380</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Reqest of appointment</h3>
                                <p class="fs-5">380</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Subscriber to portfolio</h3>
                                <p class="fs-5">380</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    

                    

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