<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet />
    <link rel="stylesheet" href="css/style.css" rel="stylesheet>
</head>
<body>
<!-- https://getbootstrap.com/docs/5.2/components/forms/ -->

<!-- TOP Header -->
    <?php include 'includes/header.php'; ?>
    
	<?php  include 'db_connect.php'; ?>
    <div class="container-fluid">

        <div class="row">
		<!-- LEFT Header -->
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
			
		<!-- RIGHT Header -->
            <div class="col-md-9">
                <!-- Right content goes here -->
				<h1> View  Appointments </h1>
				
				<?php
// Assuming you have already established a database connection

// Get the doc_id from the request
//$doc_id = $_GET['doc_id'];
$doc_id = $_SESSION["s_admin_id"];

// Query the appointments for the doctor
$sql = "SELECT * FROM tbl_appointment WHERE doc_id = ?";
//$sql = "SELECT appoint_id,pat_id, start_dt_time, end_dt_time,appoint_reason,appoint_status, pat_name FROM tbl_appointment a, tbl_patient b WHERE a.pat_id=b.pat_id and a.doc_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doc_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any appointments
if ($result->num_rows > 0) {
    // Display the appointments in a table
    echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
    echo "<tr><th>Appointment ID</th><th>Patient ID</th><th>Start Date and Time</th><th>End Date and Time</th><th>Appointment Reason</th><th>Status</th></tr>";
	echo "</thead>";
	echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['appoint_id'] . "</td>";
        echo "<td>" . $row['pat_id'] . "</td>";
        echo "<td>" . $row['start_dt_time'] . "</td>";
        echo "<td>" . $row['end_dt_time'] . "</td>";
        echo "<td>" . $row['appoint_reason'] . "</td>";
        echo "<td>" . $row['appoint_status'] . "</td>";
        echo "</tr>";
    }
	echo "</tbody>";
    echo "</table>";
} else {
    // No appointments found
    echo "No appointments available for this doctor.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>

				
				
            </div>
			
			
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
