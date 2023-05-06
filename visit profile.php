<?php
session_start();

require 'connection/config.php';

// error_reporting(0);

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
} else {
  require 'header1.php';
}


if (isset($_GET['id'])) {

  $id_name = $_GET['id'];



  $sql = "SELECT * FROM users WHERE id='$id_name'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    $picture = $row['profile_picture'];
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $birthday = $row['birthday'];
    $home_address = $row['home_address'];
    $student_number = $row['student_number'];
    $course = $row['course'];
    $year_graduate = $row['year_graduate'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $personal_website = $row['personal_website'];
    $tertiary = $row['tertiary'];
    $secondary = $row['secondary'];
    $primary_ = $row['primary_'];
    $bio = $row['bio'];
    $current_job = $row['current_job'];
    $current_company = $row['current_company'];
    $job_status = $row['job_status'];
  }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $fname; ?>
    <?php echo $lname; ?>

  </title>
</head>

<body class="d-flex flex-column">
  <main class="flex-shrink-0">
    <section class="py-5 bg-light" id="scroll-target">
      <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-3">
            <img name="profile_picture" src="assets/img/user-profile/<?php echo $picture; ?>" class="img-fluid rounded mb-5 mb-lg-0" width="250">
          </div>
          <div class="col-lg">
            <h2 class="fw-bolder">
              <?php echo $fname; ?> <?php echo $lname; ?>
            </h2>
            <p class="lead fw-normal text-muted mb-0">
              <?php echo $bio; ?>
            </p>
          </div>
        </div>
      </div>
    </section>

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
                <?php echo $current_job; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Company</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $current_company; ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Job Status</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php
                if ($job_status == 'Full Time') {
                ?>
                  <span class="badge bg-primary">
                    Full Time
                  </span>
                <?php
                } else {
                ?>
                  <span class="badge bg-success">
                    Part Time
                  </span>
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
                <?php echo $fname; ?>
                <?php echo $lname; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Course</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $course; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Birthday</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $birthday; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $home_address; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Year Graduate</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $year_graduate; ?>
              </div>
            </div>
            <hr>

          </div>
        </div>
      </div>
    </section>

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
                <a class="text-secondary" target=_blank href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo $email; ?>">
                  <?php echo $email; ?>
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                  </svg> Facebook</h6>
                <a class="text-secondary" target=_blank href="<?php echo $facebook; ?>">
                  <?php echo $facebook; ?>
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                  </svg> Instagram</h6>
                <a class="text-secondary" target=_blank href="<?php echo $instagram; ?>">
                  <?php echo $instagram; ?>
                </a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap  bg-transparent">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                  </svg> Personal Website</h6>
                <a class="text-secondary" target=_blank href="<?php echo $personal_website; ?>">
                  <?php echo $personal_website; ?>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

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
                <?php echo $secondary; ?>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Primary</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $primary_; ?>
              </div>
            </div>
            <hr>

          </div>
        </div>
      </div>
    </section>



  </main>
  <!-- Footer-->
  <?php
  require 'footer.php';
  ?>

</body>

</html>