<?php
// Include the database connection file
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];

    // Check if the username exists in the database
    $sql = "SELECT COUNT(*) FROM tbl_patient WHERE patient_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // Username already exists
        echo 'exists';
    } else {
        // Username is available
        echo 'available';
    }
} else {
    // Invalid request
    echo 'invalid';
}
?>
