<title>
    About us - Alumni Locator Management System
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
<!-- END OF PHP -->

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Our mission is to make a websites for Alumni of University Of Caloocan City</h1>
                            <p class="lead fw-normal text-muted mb-4">
                                Our focus is on providing dependable tools for managing data, effective communication features, and creative networking and career development resources that will enhance alumni involvement and contribute to the university's objectives. Our ultimate goal is to empower the university to strengthen its alumni network and establish long-lasting relationships that will benefit both the alumni and the institution.</p>
                            <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About section one-->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="assets/img/about-us-profile/standout.png" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Mission</h2>
                        <p class="lead fw-normal text-muted mb-0">To provide quality and relevant education responsive to the needs of the community and to produce graduates who are globally competitive, morally upright, and socially responsible. </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section two-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="assets/img/background image/alumniconnecting.png" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Vision</h2>
                        <p class="lead fw-normal text-muted mb-0">The University of Caloocan City is a premier university in the Asia-Pacific region recognized for its excellence in instruction, research, and community engagement towards sustainable development. It shall produce graduates who are creative, innovative, and globally competitive, with a strong commitment to ethical and civic values.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team members section-->
        <section class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="text-center">
                    <h2 class="fw-bolder">Our team</h2>
                    <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                </div>
                <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4" src="assets/img/about-us-profile/VILLANUEVA, JOSHUA A.jpg" alt="..." />
                            <h5 class="fw-bolder">Joshua Alfaro Villanueva</h5>
                            <div class="fst-italic text-muted">Full Stack &amp; Web Developer</div>
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4" src="assets/img/about-us-profile/jj.png" alt="..." />
                            <h5 class="fw-bolder">Francis Oliver D. Hiloma</h5>
                            <div class="fst-italic text-muted">Project Manager</div>
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-sm-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4" src="assets/img/about-us-profile/gok.jpg" alt="..." />
                            <h5 class="fw-bolder">Czar Mcgokou Sebastian</h5>
                            <div class="fst-italic text-muted">UI/UX Designer</div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4" src="assets/img/about-us-profile/sua.png" alt="..." />
                            <h5 class="fw-bolder">Saturnino Ursua Jr.</h5>
                            <div class="fst-italic text-muted">Front-End Developer</div>
                        </div>
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