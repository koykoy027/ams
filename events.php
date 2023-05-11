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

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">

        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
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
                    $query = "SELECT * FROM events WHERE status = 1 ORDER BY created_at DESC";

                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                    ?>
                            <div class="col-md-4 mb-5">
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
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php
    require 'footer.php';
    ?>

</body>