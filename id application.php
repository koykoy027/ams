<?php 
  require 'header.php';
  if (!isset($_SESSION['email'])){
      header("Location: login.php");                     
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      ID Application | 
    <?php echo $_SESSION['firstname']; ?>
    <?php echo $_SESSION['lastname']; ?>
    </title>
</head>
<body>
    <div class="container">
        <div class="main-body">    
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a id="default-a" href="profile.php">User Profile</a></li>              
                <li class="breadcrumb-item"><a id="default-a" href="id application" >Alumni ID Application</a></li>
                <li class="breadcrumb-item"><a id="default-a" href="request appointment.php" >Appointment</a></li>
                <li class="breadcrumb-item"><a id="default-a" href="registered alumni.php" >Registered Alumni</a></li>
                </ol>
            </nav>
            <hr>
            <!-- /Breadcrumb -->
        </div>
    </div>
  
<div class="container">
  <div class="main-body">    
  
  
  <h3>UCC Alumni Identification Card Registration</h3>
  <p style="color:red;font-weight:bold;">P. 60</p>
  
  <div class="row">
    <div class="col-md-2" id="merchandise-left" ></div> 

    <div class="col-md-10" id="merchandise-right">
      <h4 style="color: #f36601;">Basic Details</h4>
      <br>
        <div class="row">
          <div class="col-md">
            <p class="lead">Full name</p>
            <input type="text" id = "merchandise-input" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="basic-addon2">
            <!-- <button type="submit" class="input-group-text" id="basic-addon2">Submit</button> -->
          </div>
          <div class="col-md">
            <p class="lead">&#160</p>
            <input type="text" id = "merchandise-input" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="basic-addon2">
          </div>
      </div>
      <br>
      <div class="row">

          <div class="col-md">            
            <p class="lead">Birthdate</p>
            <input type="date" id = "merchandise-input" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="basic-addon2">
            <!-- <button type="submit" class="input-group-text" id="basic-addon2">Submit</button> -->
          </div>

          <div class="col-md">
            <p class="lead">Address</p>
            <input type="text" id = "merchandise-input" class="form-control" placeholder="House no., Brgy, City" aria-label="Firstname" aria-describedby="basic-addon2">
          </div>
        
      </div>
      <br>
      <div class="row">

          <div class="col-md">            
            <p class="lead">Course</p>
            <div class="form-group">
							
							<select class="form-control" id="merchandise-input">
								<option>Bachelor of Science in Computer Science</option>
								<option>Bachelor of Science in Information Technology</option>
								<option>Bachelor of Science in Information System</option>
								<option>Bachelor of Science in Entertainment and Multimedia Computing</option>								
							</select>
						</div>
            <!-- <button type="submit" class="input-group-text" id="basic-addon2">Submit</button> -->
          </div>

          <div class="col-md">
            <p class="lead">Batch</p>
            <input type="number" id = "merchandise-input" class="form-control" placeholder="Year Graduate" aria-label="Firstname" aria-describedby="basic-addon2">
          </div>

      </div>
      <br>
      <br>
      
      <div>
            <button class="btn btn-outline-primary btn-sm" style="float: left;">Reset</button>          
            <button class="btn btn-primary btn-sm" style="float: right;">Submit</button>
      </div>    
    </div>
  </div>
      

  
    </div>
  </div>




<div class="mb-5"></div>

  <!-- Choices -->


  





<?php
  require 'footer.php';
?>







</body>
</html>