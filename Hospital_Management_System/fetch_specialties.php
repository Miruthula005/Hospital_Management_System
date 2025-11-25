<?php
include 'db_connect.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch specialties
$sql = "SELECT spec_id, spec_details FROM tbl_specialties";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $spec_id = $row["spec_id"];
        $spec_details = $row["spec_details"];

        echo "<option value='$spec_id'>$spec_details</option>";
    }
} else {
    echo "<option value=''>No specialties found</option>";
}

// Close connection
$conn->close();
?>
