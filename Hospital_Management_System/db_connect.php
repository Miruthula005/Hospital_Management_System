<?php
// Database connection details
$servername = "localhost";
$username = "hmuser";
$password = "hmuser@987";
$dbname = "hmdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
