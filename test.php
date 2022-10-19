<?php
    // require 'header.php';
    // require 'connection/config.php';
    session_start();
    $msg="";
    $css_class="";
    $email = $_SESSION['email'];
    if(isset($_POST['submit'])){
        

        // echo "<pre>", print_r($_FILES['profile_picture']['name']),"</pre>";

        $profile_picture = time(). '_' . $_FILES['profile_picture']['name'];

        $target = 'img/user-profile/' . $profile_picture;

        if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target)){
            // need
            $sql="UPDATE users SET profile_picture='$profile_picture' WHERE email='$email'";
            if(mysqli_query($conn, $sql)){
                $msg="Image uploaded";
                $css_class = "alert-success";
                $sql = "SELECT * FROM users WHERE email='$email'";
          
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);            
                    $_SESSION['profile_picture'] = $row['profile_picture'];

            }
        }

            else{
                $msg = "Failed to upload to upload";
                $css_class = "alert-danger";
            }         
        }                
    }


?>

<body>
    <div class="container">
        

        <form action="" method="post" enctype="multipart/form-data">
        <img src="img/user-profile/<?php echo $_SESSION['profile_picture'];?>" alt ="<?php echo $_SESSION['profile_picture'];?>" class="rounded-circle" width="150">
            <!-- <img src="img/user-profile/blank-profile-picture-.png" onclick="triggerClick()" id="profileDisplay"> -->
            <!-- <label for="profile_picture">Profile Image</label> -->
            <br>
            <!-- <input type="file" name="profile_picture">
            <br>
            <input type="submit" name="submit"> -->

            <div class="input-group">    
                
            
                <input type="file" class="form-control" name="profile_picture" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <input class="btn btn-outline-secondary" name="submit" type="submit" value="Upload">
            </div> 

            <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class?>">
                    <?php echo $msg;?>
                </div>
            <?php endif; ?>
            
        </form>
    </div>
</body>