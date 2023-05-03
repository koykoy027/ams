<?php
session_start();
require 'connection/config.php';

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
}
require 'header1.php';

if (isset($_POST['update'])) {

  $update_firstname = $_POST['update_firstname'];
  $update_lastname = $_POST['update_lastname'];
  $update_email = $_SESSION['email'];
  $update_studentNumber = $_POST['update_studentNumber'];
  $select_option = $_POST['update_course'];
  $update_birthday = $_POST['update_birthday'];
  $update_phone_number = $_POST['update_phone_number'];
  $update_address = $_POST['update_address'];
  $update_year_graduate = $_POST['update_year_graduate'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $personal_website = $_POST['personal_website'];
  $secondary = $_POST['secondary'];
  $primary_ = $_POST['primary_'];
  $bio = $_POST['bio'];
  $current_job = $_POST['current_job'];
  $current_company = $_POST['current_company'];
  $job_status = $_POST['job_status'];

  $query = "UPDATE users SET course='$select_option', job_status = '$job_status', student_number = '$update_studentNumber', firstname='$update_firstname', lastname='$update_lastname',birthday='$update_birthday',current_company='$current_company', phone_number='$update_phone_number', home_address='$update_address', year_graduate='$update_year_graduate', facebook='$facebook', instagram='$instagram', personal_website='$personal_website', secondary='$secondary', primary_='$primary_', bio = '$bio', current_job='$current_job' WHERE email='$update_email'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {

    $sql = "SELECT * FROM users WHERE email='$update_email'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $_SESSION['firstname']; ?>
    <?php echo $_SESSION['lastname']; ?>

  </title>
</head>

<body class="d-flex flex-column">
  <main class="flex-shrink-0">



    <!-- avatar -->
    <section class="py-5 bg-light" id="scroll-target">
      <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-3">
            <h2 class="fw-bolder">
              AVATAR
            </h2>

          </div>
          <div class="col-lg">
            <?php include('test.php') ?>
          </div>
        </div>
      </div>
    </section>

    <form action="profile-update.php" enctype="multipart/form-data" method="POST">

      <!-- current job -->
      <section class="py-5" id="scroll-target">
        <div class="container px-5 my-5">
          <div class="row gx-5">
            <div class="col-lg-3">
              <h2 class="fw-bolder">
                CURRENT JOB
              </h2>
            </div>
            <div class="col-lg">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Position</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $_SESSION['current_job']; ?>" name="current_job" required>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Company</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $_SESSION['current_company']; ?>" name="current_company" required>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Job Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  if ($_SESSION['job_status'] == 'Full Time') {
                  ?>
                    <select name="job_status" class="form-control">
                      <option value="Full Time" selected>Full Time</option>
                      <option value="Part Time">Part Time</option>
                    </select>

                  <?php
                  } else {
                  ?>
                    <select name="job_status" class="form-control">
                      <option value="Full Time">Full Time</option>
                      <option value="Part Time" selected>Part Time</option>
                    </select>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <hr>

            </div>
          </div>
        </div>
      </section>

      <!-- information -->
      <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
          <div class="row gx-5">
            <div class="col-lg-3">
              <h2 class="fw-bolder">
                INFORMATION
              </h2>
            </div>
            <div class="col-lg">

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <div class="input-group">
                    <input type="text" name="update_firstname" placeholder="Firstname" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" required>
                    <input type="text" name="update_lastname" placeholder="Lastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" required>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Course</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <select name="update_course" class="form-control">
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
                  <h6 class="mb-0">Birthday</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="date" name="update_birthday" class="form-control" value="<?php echo $_SESSION['birthday']; ?>" required>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" name="update_address" class="form-control" value="<?php echo $_SESSION['home_address']; ?>" required>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Year Graduate</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="month" name="update_year_graduate" class="form-control" value="<?php echo $_SESSION['year_graduate']; ?>" required>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Bio</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <textarea style="height: 150px" id="inputOrange" name="bio" class="form-control" placeholder="Tell about yourself" id="floatingTextarea" required><?php echo $_SESSION['bio'] ?></textarea>
                </div>
              </div>
              <hr>

            </div>
          </div>
        </div>
      </section>

      <!-- contact -->
      <section class="py-5" id="scroll-target">
        <div class="container px-5 my-5">
          <div class="row gx-5">
            <div class="col-lg-3">
              <h2 class="fw-bolder">
                CONTACTS
              </h2>
            </div>
            <div class="col-lg">
              <ul class="list-group list-group-flush gap-4">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent bg-transparent">
                  <h6 class="mb-0">&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="lightblue" width="24" height="24">
                      <path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z" />
                    </svg> &nbsp;Active Email</h6>
                  <input type="text" class="form-control my-2" name="update_email" placeholder="<?php echo $_SESSION['email']; ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg> Facebook</h6>
                  <input type="text" name="facebook" value="<?php echo $_SESSION['facebook'] ?>" class="form-control my-2" placeholder="Facebook Link">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg> Instagram</h6>
                  <input type="text" name="instagram" value="<?php echo $_SESSION['instagram'] ?>" class="form-control my-2" placeholder="Instagram Link">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="2" y1="12" x2="22" y2="12"></line>
                      <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg> Personal Website</h6>
                  <input type="text" name="personal_website" value="<?php echo $_SESSION['personal_website'] ?>" class="form-control my-2" placeholder="Website Link">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- education -->
      <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
          <div class="row gx-5">
            <div class="col-lg-3">
              <h2 class="fw-bolder">
                EDUCATION
              </h2>
            </div>
            <div class="col-lg">

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Secondary</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="secondary" value="<?php echo $_SESSION['secondary']; ?>">
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Primary</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="primary_" value="<?php echo $_SESSION['primary_']; ?>">
                </div>
              </div>
              <hr>

            </div>
          </div>

        </div>
      </section>

      <button type="submit" name="update" class="btn btn-primary float-end">Save Changes</button>
    </form>



  </main>
  <!-- Footer-->
  <?php
  require 'footer.php';
  ?>

</body>

</html>