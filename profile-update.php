<!-- NEW  -->




<!-- END OF NEW -->


<!-- OLDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD -->
<?php

// Plaintext password entered by the user
$plaintext_password = "Password@123";

// The hashed password retrieved from database
$hash =
  "$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";

// Verify the hash against the password entered
$verify = password_verify($plaintext_password, $hash);

// Print the result depending if they match
if ($verify) {

  // echo 'Password Verified!  ';      
  // echo $verify;




} else {
  echo 'Incorrect Password!';
}

session_start();
require 'connection/config.php';

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
}


require 'header1.php';


if (isset($_POST['update'])) {

  // echo "<pre>", print_r($_FILES['profile_picture']['name']),"</pre>";

  // $profile_picture = time(). '_' . $_FILES['profile_picture']['name'];
  // $target = 'img/user-profile/' . $profile_picture;

  //personal information
  // $profile_picture = $_POST['profile_picture'];
  $update_firstname = $_POST['update_firstname'];
  $update_lastname = $_POST['update_lastname'];
  $update_email = $_SESSION['email'];
  // $update_password = $_POST['update_password'];

  $update_studentNumber = $_POST['update_studentNumber'];
  $select_option = $_POST['update_course'];
  $update_birthday = $_POST['update_birthday'];
  $update_phone_number = $_POST['update_phone_number'];
  $update_address = $_POST['update_address'];
  $update_year_graduate = $_POST['update_year_graduate'];

  //social media
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $personal_website = $_POST['personal_website'];

  //school        

  $secondary = $_POST['secondary'];
  $primary_ = $_POST['primary_'];
  $bio = $_POST['bio'];
  $current_job = $_POST['current_job'];
  $current_company = $_POST['current_company'];
  $job = $_POST['job_status'];

  // if($_SESSION['job_status'] == 'true'){
  //   echo 'true';
  // }

  // elseif($_SESSION['job_status'] == 'false'){
  //   echo 'false';
  // }

  // elseif($_SESSION['job_status'] == 'searching'){
  //   echo 'searching';
  // }

  if ($job == 1) {
    $job_status = "false";
  } elseif ($job == 2) {
    $job_status = "true";
  } elseif ($job == 3) {
    $job_status = "searching";
  }

  $query = "UPDATE users SET course='$select_option', job_status = '$job_status', student_number = '$update_studentNumber', firstname='$update_firstname', lastname='$update_lastname',birthday='$update_birthday',current_company='$current_company', phone_number='$update_phone_number', home_address='$update_address', year_graduate='$update_year_graduate', facebook='$facebook', instagram='$instagram', personal_website='$personal_website', secondary='$secondary', primary_='$primary_', bio = '$bio', current_job='$current_job' WHERE email='$update_email'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {

    $sql = "SELECT * FROM users WHERE email='$update_email'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);

      // $_SESSION['password'] = $row['password'];
      $_SESSION['profile_picture'] = $row['profile_picture'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['student_number'] = $row['student_number'];
      $_SESSION['birthday'] = $row['birthday'];

      $_SESSION['phone_number'] = $row['phone_number'];
      $_SESSION['home_address'] = $row['home_address'];
      $_SESSION['year_graduate'] = $row['year_graduate'];
      $_SESSION['course'] = $row['course'];

      $_SESSION['facebook'] = $row['facebook'];
      $_SESSION['instagram'] = $row['instagram'];
      $_SESSION['personal_website'] = $row['personal_website'];

      $_SESSION['tertiary'] = $row['tertiary'];
      $_SESSION['secondary'] = $row['secondary'];
      $_SESSION['primary_'] = $row['primary_'];
      $_SESSION['bio'] = $row['bio'];
      $_SESSION['current_job'] = $row['current_job'];
      $_SESSION['current_company'] = $row['current_company'];
      $_SESSION['job_status'] = $row['job_status'];

      header("Location: profile.php");
      echo '<script type="text/javascript">toastr.success("Please wait for our respond within 24hrs", "Sent Success!")</script>';
    }
  } else {

    header("Location: profile.php");
    echo 'failed';
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    Update |
    <?php echo $_SESSION['firstname']; ?>
    <?php echo $_SESSION['lastname']; ?>
  </title>
</head>

<body>


  <div class="container">
    <div class="main-body">
      <div class="col-md-8" style="margin: auto;">

        <div class="card mb-3">
          <div class="card-header">
            <h4>Update &nbsp<span style="color:#f36601;">Personal Information</span></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Profile Picture</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php include 'test.php'; ?>
                <!-- <img src="img/user-profile/<?php echo $_SESSION['profile_picture']; ?>" alt ="<?php echo $_SESSION['profile_picture']; ?>" class="rounded-circle" width="150"> -->
                <!-- <div class="input-group">                    
                        <input type="file" name="profile_picture" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <input class="btn btn-outline-secondary" type="submit" name="inputGroupFileAddon04" value="Upload">
                    </div>  -->
                <br>
              </div>
            </div>
            <hr>




            <form action="profile-update.php" enctype="multipart/form-data" method="POST">




              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input type="text" id="inputOrange" name="update_firstname" placeholder="Firstname" aria-label="First name" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" required>
                    <input type="text" id="inputOrange" name="update_lastname" placeholder="Lastname" aria-label="Last name" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" required>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Student Number</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input class="form-control" id="inputOrange" name="update_studentNumber" id="disabledInput" type="text" placeholder="Student Number" value="<?php echo $_SESSION['student_number']; ?>" required>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Course</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <select class="form-select" name="update_course">
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Science in Information technology">Bachelor of Science in Information technology</option>
                    <option value="Bachelor of Science in Information system">Bachelor of Science in Information system</option>
                    <option value="Bachelor of Science in Entertainment and Multimedia Computing">Bachelor of Science in Entertainment and Multimedia Computing</option>
                  </select>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Birth date</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input type="date" id="inputOrange" name="update_birthday" aria-label="First name" class="form-control" value="<?php echo $_SESSION['birthday']; ?>" required>
                  </div>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Current Job</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input class="form-control" id="inputOrange" name="current_job" id="disabledInput" type="text" placeholder="Position" value="<?php echo $_SESSION['current_job']; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input class="form-control" id="inputOrange" name="current_company" id="disabledInput" type="text" placeholder="Company Name" value="<?php echo $_SESSION['current_company']; ?>">
                  </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Job Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="job_status" id="flexRadioDefault1" value="1" <?php echo $a; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                      Prefer Not to say
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="job_status" id="flexRadioDefault2" value="2" <?php echo $b; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Job Searching
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="job_status" id="flexRadioDefault3" value="3" <?php echo $c; ?>>
                    <label class="form-check-label" for="flexRadioDefault3">
                      Seeking Employment
                    </label>

                  </div>
                  <em style="font-size: small;">
                    <span style="color:red">Note: </span>
                    This will automatically display in public. <?php echo $_SESSION['job_status']; ?>
                  </em>

                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input class="form-control" id="inputOrange" name="update_email" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['email']; ?>" disabled>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input minlength="11" maxlength="11" type="text" id="inputOrange" name="update_phone_number" aria-label="First name" class="form-control" value="<?php echo $_SESSION['phone_number']; ?>" required>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input type="text" id="inputOrange" name="update_address" aria-label="First name" class="form-control" value="<?php echo $_SESSION['home_address']; ?>" required>
                  </div>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Year Graduate</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input type="month" id="inputOrange" minlength="4" maxlength="4" name="update_year_graduate" aria-label="First name" class="form-control" value="<?php echo $_SESSION['year_graduate']; ?>" required>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Educational Background</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input class="form-control" id="inputOrange" name="update_email" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['tertiary']; ?>" disabled>
                  </div>

                  <div class="form-floating">
                    <textarea style="height: 150px" id="inputOrange" name="secondary" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $_SESSION['secondary'] ?></textarea>
                    <label for="floatingTextarea">Secondary</label>
                  </div>

                  <div class="form-floating">
                    <textarea style="height: 150px" id="inputOrange" name="primary_" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $_SESSION['primary_'] ?></textarea>
                    <label for="floatingTextarea">Primary</label>
                  </div>
                </div>
              </div>
              <hr>



              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Personal Skills</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="form-floating">
                    <textarea style="height: 150px" id="inputOrange" name="bio" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" required><?php echo $_SESSION['bio'] ?></textarea>
                    <label for="floatingTextarea">Personal Skills</label>
                  </div>
                  <br>

                </div>
              </div>







              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Social Media</h6>
                </div>
                <div class="col-sm-9 text-secondary">




                  <div class="input-group mb-3">
                    <span class="input-group-text" id="orange">Facebook</span>
                    <input type="text" id="inputOrange" name="facebook" value="<?php echo $_SESSION['facebook'] ?>" class="form-control" placeholder="Facebook Link" aria-label="Username" aria-describedby="basic-addon1">
                    <br>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="orange">Instagram</span>
                    <input type="text" id="inputOrange" name="instagram" value="<?php echo $_SESSION['instagram'] ?>" class="form-control" placeholder="Instagram Link" aria-label="Username" aria-describedby="basic-addon1">
                    <br>
                  </div>



                  <div class="input-group mb-3">
                    <span class="input-group-text" id="orange">Personal Website</span>
                    <input type="text" id="inputOrange" name="personal_website" value="<?php echo $_SESSION['personal_website'] ?>" class="form-control" placeholder="Personal Link" aria-label="Username" aria-describedby="basic-addon1">
                    <br>
                  </div>
                  <hr>






                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-default" type="submit" name="update" id="orange">Update profile</button>
                </div>
              </div>

            </form>
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