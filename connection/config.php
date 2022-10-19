<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "ams";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");      
}

else{
    // echo 'Connected madafakaz';
    
}
?>


