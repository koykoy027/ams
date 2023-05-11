<title>
    Post - Alumni Locator Management System
</title>

<!-- PHP -->
<?php
session_start();
require 'connection/config.php';
if (!isset($_SESSION['email'])) {
    require 'header.php';
} else {
    require 'header1.php';
}
if (isset($_GET['id'])) {

    $id_name = $_GET['id'];



    $sql = "SELECT * FROM events WHERE id='$id_name'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $picture = $row['image'];
        $title = $row['title'];
        $type = $row['type'];
        $description = $row['description'];
        $where_at = $row['where_at'];
        $when_at = $row['when_at'];
        $status = $row['status'];
        $created_at = $row['created_at'];
    }
}
?>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">

        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <!-- <div class="d-flex align-items-center mt-lg-5 mb-4">
                            <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                            <div class="ms-3">
                                <div class="fw-bold">Valerie Luna</div>
                                <div class="text-muted">News, Business</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">
                                    <?php echo $title; ?>
                                </h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2"><?php echo $created_at; ?></div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $type; ?></a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="assets/img/events/placeholder.png" alt="..." width="50%" /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <div class="row">
                                    <div class="col-md">
                                        <p class="fs-5 fw-bold">
                                            When
                                        </p>
                                        <p class="fs-5 mb-4">
                                            <?php echo $when_at; ?>
                                        </p>
                                    </div>
                                    <div class="col-md">
                                        <p class="fs-5 fw-bold">
                                            Where
                                        </p>
                                        <p class="fs-5 mb-4">
                                            <?php echo $where_at; ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="fs-5 mb-4">
                                    <?php echo $description; ?>
                                </p>

                            </section>
                        </article>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<?php
require 'footer.php'
?>