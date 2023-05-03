<title>
    Contact us - Alumni Locator Management System
</title>

<?php
session_start();

require 'connection/config.php';

if (!isset($_SESSION['email'])) {
    require 'header.php';
} else {
    require 'header1.php';
}
$messageAlert = '';

if (isset($_POST['submit'])) {


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (firstname, lastname, email, contact_number, message) VALUES ('$firstname', '$lastname', '$email', '$contact_number', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $messageAlert = 'Your email has successfully sent!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- Contact form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">

                            <form id="contactForm" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Firstname" required />
                                            <label for="firstname">Firstname</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Lastname" required />
                                            <label for="lastname">Lastname</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" required />
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="contact_number" type="tel" placeholder="(123) 456-7890" required />
                                    <label for="phone">Phone number</label>

                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                                    <label for="message">Message</label>

                                </div>

                                <?php if (!empty($messageAlert)) : ?>
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <?php echo $messageAlert; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Contact cards-->
                <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-dots"></i></div>
                        <div class="h5 mb-2">Chat with us</div>
                        <p class="text-muted mb-0">Chat live with one of our support specialists.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                        <div class="h5">Ask the community</div>
                        <p class="text-muted mb-0">Explore our community forums and communicate with other users.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-question-circle"></i></div>
                        <div class="h5">Support center</div>
                        <p class="text-muted mb-0">Browse FAQ's and support articles to find solutions.</p>
                    </div>
                    <div class="col">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                        <div class="h5">Call us</div>
                        <p class="text-muted mb-0">Call us during normal business hours at (555) 892-9403.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require 'footer.php';
    ?>

</body>