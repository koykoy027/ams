<?php
    require 'config.php';

    if(isset($_POST['submit'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (firstname, lastname, email, message) VALUES ('$firstname', '$lastname', '$email', '$message')";

        $conn->query($sql) or die ($conn->error);
        
        

        // echo '<script type="text/javascript">toastr.success("Please wait for our respond within 24hrs", "Sent Success!")</script>';
        header ("Location: index.php");
        
        


        
            

    }


    
?>