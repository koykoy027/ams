<head>
    <link rel="icon" href="../img/AMS Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
                <a href="merchandise.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Merchandise</a>
                <a href="schedule.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                    <h3 class="fs-4 mb-3">Weekdays Schedule</h3>

                    <?php

                    

                    
                        if(isset($_POST['update_sched_data'])){
                            $days = $_POST['days'];
                            $open = $_POST['open'];
                            $close = $_POST['close'];
                            $query = "UPDATE schedule SET open='$open', close='$close' WHERE days='$days'";
                            $query_run = mysqli_query($conn, $query);
                            if($query_run){
                                $_SESSION['status'] = "Data Updated Successfully";
                                // header("Location: schedule.php");
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
                        ?>

    <div class="row g-3 my-2">
    
    <?php
    foreach($query_run as $row){
        ?>
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                

            
            <div class="col-sm">
            <div class="card shadow-lg p-3 mb-3 bg-body rounded" style="text-transform:uppercase;">
                    
                    <h3 style="color:#f36601;"><?=$row['days'];?></h3>                    
                    <?=$row['open'];?> - <?=$row['close'];?>           
                    <br>
                </div>                                

            </div>
                
                

            <!-- </div> -->
        <!-- </div> -->

        

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
        </div>
    </div>
            <!-- CONTENTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTO NAKO SAYO -->
            <!-- <div class="container-fluid px-4"> -->
            <br>
            

            <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow-lg p-5 mb-5 bg-body rounded">
                    <h3 class="fs-4 mb-3">Weekdays Scheduling</h3>                    
                    <div class="card-body">
                        <form action="" method="POST">

                        
                            
                        <div class="form-group mb-3">
                                <label for="">Days</label>
                                <!-- <input type="text" name="days" class="form-control" > -->

                                <select name="days" class="form-control">
                                    <option value="monday">Monday</option>	
                                    <option value="tuesday">Tuesday</option>	
                                    <option value="wednesday">Wednesday</option>	
                                    <option value="thursday">Thursday</option>	
                                    <option value="friday">Friday</option>	                        
                                </select>						
                            </div>    
                        <div class="form-group mb-3">
                                <label for="">Opening</label>
                                <input type="text" name="open" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Closing</label>
                                <input type="text" name="close" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <button type="submit" name="update_sched_data" class="btn btn-primary">Update Data</button>
                                <br>
                            </div>
                            

                        </form>

                    </div>
                </div>
            </div>

            

            
                    




        
            





            
            <!-- </div>END OF CONTENT CONTAINER -->
        </div>

        <div class="row justify-content-center">
            
        </div>
    </div>

    
        
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>