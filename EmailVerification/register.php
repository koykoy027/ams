

<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    require '../connection/config.php';
 
    if (isset($_POST["register"]))
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if ($password == $cpassword) {            


            $sql = "SELECT * FROM users WHERE email='$email'";
		    $result = mysqli_query($conn, $sql);
		        if (!$result->num_rows > 0) {
 //Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);
 
 try {
     //Enable verbose debug output
     $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

     //Send using SMTP
     $mail->isSMTP();

     //Set the SMTP server to send through
     $mail->Host = 'smtp.gmail.com';

     //Enable SMTP authentication
     $mail->SMTPAuth = true;

     //SMTP username
     $mail->Username = 'ucc.ams1971@gmail.com';

     //SMTP password
     $mail->Password = 'rekkles01';

     //Enable TLS encryption;
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

     //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
     $mail->Port = 587;

     //Recipients
     $mail->setFrom('ucc.ams1971@gmail.com', 'AMS');

     //Add a recipient
     $mail->addAddress($email, $firstname);

     //Set email format to HTML
     $mail->isHTML(true);

     $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

     $mail->Subject = 'Email verification';
     $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

     $mail->send();
     // echo 'Message has been sent';

     $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

     // connect with database
     // $conn = mysqli_connect("localhost", "root", "", "test");
     

     // insert in users table
     $sql = "INSERT INTO users(firstname,lastname, email, password, verification_code, email_verified_at) VALUES ('" . $firstname . "','" . $lastname . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
     mysqli_query($conn, $sql);

     header("Location: email-verification.php?email=" . $email);
     // header("Location: ../register.php?email=" . $email);
     exit();
         } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
                }else{
                    echo "<script>alert('email already exist.')</script>";
                }


            
       

        }

        else {
		
            echo "<script>alert('Password Not Matched.')</script>";
        }






    }
?>


<!-- <form method="POST">
    <input type="text" name="name" placeholder="Enter name" required />
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
    
    <input type="submit" name="register" value="Register">

    <input type="text" class="btn btn-primary" value="asds">
</form> -->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <style>
        body{
            width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("../img/background image/home-background-1.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;


            background-repeat: no-repeat;            
            background-size: cover;
            
            
        }
    </style>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    

    <div class="container">
        <div class="row position-absolute top-50 start-50 translate-middle">
			<div class="col-md">
				<div class="shadow-lg p-5 mb-5 bg-body rounded">
                    <h1>Join <span style="color:#f36601;">us!</span></h1>						
					<p class="lead">
						Please fill out the quick form for registration
					</p>
                    
                    <form action="" method="post">
                        <div class="input-group mb-4 mt-4">									
							<input type="text" aria-label="First name" class="form-control" placeholder="First name" name="firstname" required>
							<input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lastname" required>
                        </div>
                        
                        <div class="mb-3">									
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" name="email" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">									
							<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" required>                            
                        </div>

                        <div class="mb-3">									
							<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Confirm password" name="cpassword" required>                            
                        </div>

							
																						
						<br>								
						<input type="submit" class="btn btn-primary btn-md"  name="register"></input>

					</form>

							
				</div>
			</div>

		</div>
    </div>















  </body>
</html>









