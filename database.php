<?php
    $dsn = 'localhost';
    $username = 'ts_user';
    $password = 'pa55word';
    $dbname = 'tech_support';
    
    // Create connection    
    $conn = new mysqli($dsn, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
      
    //$conn->close();
?>