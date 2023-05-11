<?php
// require 'header.php';
// require '../connection/config.php';
// session_start();
$msg = "";
$css_class = "";
$email = $_SESSION['email'];
if (isset($_POST['submit'])) {


    // echo "<pre>", print_r($_FILES['profile_picture']['name']),"</pre>";

    $profile_picture = time() . '_' . $_FILES['profile_picture']['name'];

    $target = 'assets/img/user-profile/' . $profile_picture;

    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target)) {
        // need
        $sql = "UPDATE users SET profile_picture='$profile_picture' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            $msg = "Image uploaded";
            $css_class = "alert-success";
            $sql = "SELECT * FROM users WHERE email='$email'";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['profile_picture'] = $row['profile_picture'];
            }
        } else {
            $msg = "Failed to upload to upload";
            $css_class = "alert-danger";
        }
    }
}


?>





<form action="" method="post" enctype="multipart/form-data">
    <img src="" class="img-fluid rounded mb-5 mb-lg-0" width="250" id="img">

    <div class="input-group">
        <input type="file" class="form-control pd-5" name="profile_picture" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">

    </div>
    <input class="ms-5 btn btn-primary float-end mt-3" name="submit" type="submit" value="Save Changes">

    <?php if (!empty($msg)) : ?>
        <div class="alert <?php echo $css_class ?>">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <script>
        let img = document.getElementById('img');
        let input = document.getElementById('inputGroupFile04');

        input.onchange = (e) => {
            if (input.files[0])
                img.src = URL.createObjectURL(input.files[0]);

        }
    </script>

</form>