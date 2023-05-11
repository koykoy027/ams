<title>
    Home - Alumni Locator Management System
</title>

<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION['email'])) {
    require 'header.php';
} else {
    require 'header1.php';
}


?>
<style>
    header {
        background: url('assets/img/background image/ucc-background-blur.PNG');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Welcome Alumni</h1>
                            <p class="lead fw-normal text-white mb-4">By gathering and displaying alumni ratings and testimonials on your website, you can help build trust with prospective students and demonstrate the value of your institution's education and programs.
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <!-- <a class="btn btn-outline-light btn-lg px-4" href="about.php">Learn More</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="assets/img/about-us-profile/socialization.png" alt="..." /></div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">A better way to start trusting Alumni Locator.</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                <h3 class="card-title">Online Admission System</h3>
                                <p class="card-text">Software system for automomate the process of student admission in Universitites, Colleges & Schools. Web based application has the ability to calculate based on reservation of seats as per Govt regulations, set up criterias, generate the selection list / merit list in a single click, payment gateway integration etc.</p>

                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                <h3 class="card-title">Alumni Management System</h3>
                                <p class="card-text">Online application software acts as a interactive medium between the old student and the Schools, Colleges, Universities or institutions. Android apps for Alumni Management System comes preloaded with useful features & scopes. Alumni data can be centralized and combined to use it in any future endeavours.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h3 class="card-title">Online Newsletter</h3>
                                <p class="card-text">Web Based system for personalized promotional HTML email newsletters to prospective buyers / clients. The mails can be templated or customized. The system can track campaigns or individual mails whether they have been received at the intended mail boxes, opened or have been bounced etc and empowered with cron jobs.</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h3 class="card-title">School College ERP System</h3>
                                <p class="card-text">ERP is a component wise combined software system to automate schools, colleges or universities. Software modules can be added on for fees collections, online admission, staff attendance, library management, students promotion and online education support, id card generation or online examination systems.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"An alumni locator management system is a software tool that helps educational institutions or organizations keep track of their alumni and their current locations. These systems often use data such as alumni contact information, social media profiles, and professional networks to create a comprehensive database of alumni."</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                <div class="fw-bold">
                                    ALMS
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    Alumni Locator Management System
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container-fluid px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Event Posting</h2>
                            <p class="lead fw-normal text-muted mb-5">
                                An alumni management system's event posting feature allows for efficient and organized communication with former students regarding upcoming events and activities.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <?php
                    require 'connection/config.php';
                    $query = "SELECT * FROM events WHERE status = 1 ORDER BY created_at DESC LIMIT 4";

                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                    ?>



                            <div class="col-md-3 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="assets/img/events/<?= $row['image']; ?>" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                            <?= $row['type']; ?>
                                        </div>
                                        <a class="text-decoration-none link-dark stretched-link" href="event-post.php?id=<?php echo $row['id'] ?>">
                                            <h5 class=" card-title mb-3">
                                                <?= $row['title']; ?>
                                            </h5>
                                        </a>
                                        <p class="card-text mb-0">
                                            <?= $row['description']; ?>
                                        </p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <!-- <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold">Kelly Rowan</div> -->
                                                <div class="text-muted">
                                                    <?= $row['created_at']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    <?php
                        }
                    } else {
                        echo "<h3 class='text-center'>No post yet</h3>";
                    }

                    ?>
                </div>

                <div class="d-flex justify-content-end">
                    <a class="text-decoration-none" href="events.php">
                        View all
                        <i class="bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php
    require 'footer.php';
    ?>

</body>