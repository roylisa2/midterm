<?php
    $dsn = 'localhost';
    $username = 'mgs_user';
    $password = 'pa55word';
    $dbname = 'shopDB';
    
    // Create connection    
    $conn = new mysqli($dsn, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
      
    //$conn->close();
?>