<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="asset/style.css">
    <!-- My CSS -->

    <link rel="icon" type="png" href="asset/img/branding.png" />
    <title>Alumni Locator Management System - Event Posts Create</title>
</head>

<body>
    <?php
    require '../connection/config.php';
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
    }
    $messageAlert = "";
    $messageAlertStyle = "";

    $email = $_SESSION['email'];
    if (isset($_POST['submit'])) {

        // this is for image
        $image = time() . '_' . $_FILES['image']['name'];
        $target = '../assets/img/events/' . $image;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // this is for others information
            // $image = $_POST['image'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $where_at = $_POST['where_at'];
            $when_at = $_POST['when_at'];
            $status = '1';

            $sql = "INSERT INTO events (image, title, description, type, where_at, when_at, status) VALUES ('$image' ,'$title', '$description', '$type', '$where_at', '$when_at', '$status')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                $messageAlert = 'Congratulations! Your post has been successfully submitted. Thank you for sharing your thoughts with us. We appreciate your contribution to our community.';
                $messageAlertStyle = 'success';
            } else {
                // header("Location: contact.php");
                $messageAlert = 'Sorry, your post was not able to be submitted. Please check your internet connection and try again later.' . $sql;
                $messageAlertStyle = 'danger';
            }
        }
    }
    ?>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="dashboard.php" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Alumni Locator Dashboard</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="alumni students.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Alumni Students</span>
                </a>
            </li>

            <li>
                <a href="email.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Email</span>
                </a>
            </li>
            <li class="active">
                <a href="event.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Event Posts</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="team.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li>
                <a href="" class="logout" data-bs-toggle="modal" data-bs-target="#logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>

                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <!-- <input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button> -->
                </div>
            </form>
            <!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->

            <li class="nav-item dropdown">
                <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="asset/img/avatar/<?php echo $_SESSION['avatar']; ?>" class="rounded-circle" height="30px">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
                </ul>
            </li>

        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Event Posts</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="event.php" href="#">Event posts</a>
                        </li>
                        <li>
                            <a class="active" href="#">Create</a>
                        </li>
                    </ul>
                </div>
                <a href="event.php" class="btn-download">
                    <i class='bx bx-left-arrow'></i>
                    <span class="text">Go Back</span>
                </a>
            </div>

            <div class="table-data row m-auto mt-4">
                <div class="">
                    <div class="head">
                        <h3>Create Posts</h3>
                    </div>
                    <div class="container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <?php if (!empty($messageAlert)) : ?>
                                    <div class="alert alert-<?php echo $messageAlertStyle ?> alert-dismissible" role="alert">
                                        <?php echo $messageAlert; ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md">
                                    <img class="img-thumbnail" width="250" id="image" />
                                    <input type="file" class="form-control" id="inputGroupFile04" name="image" required>
                                </div>
                                <script>
                                    let image = document.getElementById('image');
                                    let input = document.getElementById('inputGroupFile04');

                                    input.onchange = (e) => {
                                        if (input.files[0])
                                            image.src = URL.createObjectURL(input.files[0]);
                                    }
                                </script>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Title" required />
                                </div>
                                <div class="col-md">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="Orientation Week">Orientation Week</option>
                                        <option value="Homecoming">Homecoming</option>
                                        <option value="Career Fair">Career Fair</option>
                                        <option value="Cultural Festivals">Cultural Festivals</option>
                                        <option value="Charity Events">Charity Events</option>
                                        <option value="Student Government Elections">Student Government Elections</option>
                                        <option value="Graduation Ceremony">Graduation Ceremony</option>
                                        <option value="Guest Speakers">Guest Speakers</option>
                                        <option value="Athletic Events">Athletic Events</option>
                                        <option value="Academic Conferences">Academic Conferences</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label for="where_at">Where</label>
                                    <input id="where_at" name="where_at" type="text" class="form-control" placeholder="Location or venue" required />
                                </div>
                                <div class="col-md">
                                    <label for="when_at">When</label>
                                    <input id="when_at" name="when_at" type="date" class="form-control" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" cols="30" rows="10" placeholder="Your announcements" required></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" name="submit" type="submit">Create post</button>
                            </div>


                        </form>


                    </div>
                </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="logoutLabel">Logout session</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to leave and logout? All the unsaved changes will be lost.</p>
                    <br>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-block mx-1" data-bs-dismiss="modal">No, Cancel</button>
                        <a href="logout.php" type="button" class="btn btn-primary btn-block mx-1">Yes, Logout</a>
                    </div>



                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="asset/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table').DataTable({
                // "dom": 'ftip'
            });

        });
    </script>
</body>

</html>