<?php 
  
  session_start();
  
  if (!isset($_SESSION['email'])){
      header("Location: login.php");                     
  }

  else{
    require 'header1.php';
  }

  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php echo $_SESSION['firstname']; ?>
    <?php echo $_SESSION['lastname']; ?>
    
    </title>
</head>
<body>

    
  

    <div class="container">
      <div class="main-body">
        <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a id="default-a" href="profile.php">User Profile</a></li>              
            
            <li class="breadcrumb-item"><a id="default-a" href="request appointment.php" >Appointment</a></li>
            <li class="breadcrumb-item"><a id="default-a" href="registered alumni.php" >Registered Alumni</a></li>
          </ol>
        </nav>
        <hr>           -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                
                  <div class="d-flex flex-column align-items-center text-center">
                  <a href="logout.php" class="btn btn-primary btn-md" style="margin-left:80%;">Logout</a>
                  
                    <img name="profile_picture" src="img/user-profile/<?php echo $_SESSION['profile_picture'];?>" alt ="<?php echo $_SESSION['profile_picture'];?>" class="rounded-circle" width="150">
                    
                    <div class="mt-3">
                     <?php
                      if($_SESSION['job_status'] == 'searching'){
                        echo "<h5>".$_SESSION['firstname']." ". $_SESSION['lastname']." ". '<i class="fa-solid fa-circle" title="Looking for Emplyoee" style="color:red;font-size: xx-small;"></i></h5>';
                        
                      }
                      elseif($_SESSION['job_status'] == 'true'){
                        echo "<h5>".$_SESSION['firstname']." ". $_SESSION['lastname']." ". '<i class="fa-solid fa-circle" title="Job Searcing" style="color:green;font-size: xx-small;"></i></h5>';

                        
                        
                      }
                      else{
                        echo "<h5>".$_SESSION['firstname']." ". $_SESSION['lastname']. "</h5>";
                      }

                      ?>                      

                      <p class="text-secondary mb-1"><?php echo $_SESSION['current_job']; ?></p>
                      <p class="text-secondary mb-1"><?php echo $_SESSION['current_company']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">                               

                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="lightblue" width="24" height="24"><path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"/></svg> &nbsp;Active Email</h6>
                    <a class="text-secondary" target= _blank href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a>
                  </li>

                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</h6>
                    <a class="text-secondary" target= _blank href="https://www.facebook.com/<?php echo $_SESSION['facebook'];?>">facebook.com/<?php echo $_SESSION['facebook'];?></a>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</h6>
                    <a class="text-secondary" target= _blank href="https://www.instagram.com/<?php echo $_SESSION['instagram']; ?>"><?php echo $_SESSION['instagram']; ?></a>
                  </li>
                  

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Personal Website</h6>
                    <a class="text-secondary" target= _blank href="<?php echo $_SESSION['personal_website']; ?>"><?php echo $_SESSION['personal_website']; ?></a>
                  </li>
                  
                  
                  
                  
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <h3 class="d-flex align-items-center mb-3"><em><span style="color:#f36601;">Personal &nbsp</span></em>Information</h3>
                <br>
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
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                    
                      <?php echo $_SESSION['email']; ?>
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
                  
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">                      
                      <?php echo $_SESSION['phone_number']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['home_address']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Year Graduate</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['year_graduate']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-default" href="profile-update.php" id="orange">Update profile</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                    <h4 class="d-flex align-items-center mb-3"><em><span style="color:#f36601;">Educational &nbsp</span></em>Background</h4>
                      <large>Tertiary</large>
                      <br>
                      <small><?php echo $_SESSION['tertiary']; ?> - <?php echo $_SESSION['year_graduate']; ?></small>
                      <hr>
                      <large>Secondary</large>
                      <br>
                      <small><?php echo $_SESSION['secondary']; ?></small>
                      <hr>
                      <large>Primary</large>
                      <br>
                      <small><?php echo $_SESSION['primary_']; ?></small>
                      <hr>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">

                    <h4 class="d-flex align-items-center mb-3"><em><span style="color:#f36601;">Personal &nbsp</span></em>Skills</h4>
                    <large>Computer Skills</large>
                      <br>
                      <small><?php echo $_SESSION['bio']; ?></small>
                      <hr>
                      <large>Resume</large>
                      <br>                      
                      <hr>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
</div>

</div>







    






























<?php
  require 'footer.php';
?>







</body>
</html>