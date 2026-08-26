<?php
// ============================================
// DATABASE CONNECTION FILE
// This file connects to MySQL using mysqli.
// Every other PHP file will "include" this file
// whenever it needs to talk to the database.
// ============================================

$host   = "localhost";  // WAMP runs MySQL on localhost
$user   = "root";       // default WAMP username
$pass   = "thisandu04#";            // default WAMP password (blank)
$dbname = "student_db";  // the database we created in phpMyAdmin

// Create the connection
$conn = new mysqli($host, $user, $pass, $dbname);

// If connection fails, stop everything and show the error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
