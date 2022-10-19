<?php
        require 'config.php';        
        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $message = $conn->query($sql) or die ($conn->error);
        $row = $message->fetch_assoc();  
?>

