<?php

// DATABASE CONNECTION FILE

$host   = "localhost";  
$user   = "root";       
$pass   = "thisandu04#";            
$dbname = "student_db";  

$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
