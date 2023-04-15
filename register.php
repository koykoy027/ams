<title>
    Register - Alumni Locator Management System
</title>

<!-- PHP -->
<?php
include 'header.php';
include 'connection/config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $student_number = $_POST['student_number'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $phone_number = $_POST['phone_number'];


    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (lastname,firstname, email, student_number,password, phone_number)
					VALUES ('$lastname','$firstname', '$email', '$student_number','$password', '$phone_number')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";

                $lastname = "";
                $firstname = "";
                $student_number = "";
                $email = "";
                $phone_number = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {

        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>
<!-- END OF PHP -->

<body class="d-flex flex-column bg-light">
    <main class="flex-shrink-0">
        <!-- Login section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">REGISTRATION</h1>
                    <!-- <p class="text-sm fw-normal text-muted mb-0">TO FULLY ACCESSED ALUMNI LOCATOR!</p> -->
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Login card pro-->
                    <div class="col-lg-8 col-xl-6">
                        <div class="card mb-5 mb-xl-0">
                            <div class="card-body p-5">
                                <form action="" method="POST">
                                    <!-- Name input-->
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="firstname" name="firstname" type="text" placeholder="FirstName" value="<?php echo $firstname; ?>" required />
                                                <label for="firstname">FirstName</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="lastname" name="lastname" type="text" placeholder="LastName" value="<?php echo $lastname; ?>" required />
                                                <label for="lastname">LastName</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Student number input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="student_number" name="student_number" type="text" placeholder="Student Number" value="<?php echo $student_number; ?>" required />
                                        <label for="student_number">Student Number</label>
                                    </div>
                                    <!-- birthday input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="birthday" name="birthday" type="date" placeholder="Student Number" value="<?php echo $birthday; ?>" required />
                                        <label for="birthday">Birthday</label>
                                    </div>
                                    <hr>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email Address" value="<?php echo $email; ?>" required />
                                        <label for="email">Email address</label>
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" value="<?php echo $password; ?>" required />
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" value="<?php echo $cpassword; ?>" required />
                                        <label for="cpassword">Confirm Password</label>
                                    </div>
                                    <div class="d-grid">
                                        <button name="submit" class="btn btn-primary">Sign up</button>
                                        <span class="mt-3">
                                            Already have account yet?
                                            <a href="login.php">Sign in here</a>
                                        </span>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require 'footer.php';
    ?>
</body>