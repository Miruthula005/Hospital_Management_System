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
				<h1> Doctor View Appointments </h1>
				
				<?php
// Assuming you have already established a database connection

// Get the doc_id from the request
//$doc_id = $_GET['doc_id'];
$doc_id = $_SESSION["s_admin_id"];

// Query the appointments for the doctor with patient names
$sql = "SELECT a.*, p.pat_name
        FROM tbl_appointment AS a
        INNER JOIN tbl_patient AS p ON a.pat_id = p.pat_id
        WHERE a.doc_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doc_id);
$stmt->execute();
$result = $stmt->get_result();
//echo $sql;

// Check if there are any appointments
if ($result->num_rows > 0) {
    echo "<form action='doc_appointment_action.php' method='POST'>";
	 echo "<div class='table-responsive'>";
     echo "<table class='table table-bordered'>";
     echo "<thead>";
    //echo "<table>";
    echo "<tr><th>Appointment ID</th><th>Patient Name</th><th>Start Date and Time</th><th>End Date and Time</th><th>Appointment Reason</th><th>Appointment Status</th><th>Action</th></tr>";
	echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['appoint_id'] . "</td>";
        echo "<td>" . $row['pat_name'] . "</td>";
        echo "<td>" . $row['start_dt_time'] . "</td>";
        echo "<td>" . $row['end_dt_time'] . "</td>";
        echo "<td>" . $row['appoint_reason'] . "</td>";
        echo "<td>";
        echo "<select name='status[" . $row['appoint_id'] . "]'>";
        echo "<option value='Pending' " . ($row['appoint_status'] == 'Pending' ? 'selected' : '') . ">Pending</option>";
        echo "<option value='Confirmed' " . ($row['appoint_status'] == 'Confirmed' ? 'selected' : '') . ">Confirmed</option>";
        echo "<option value='Cancelled' " . ($row['appoint_status'] == 'Cancelled' ? 'selected' : '') . ">Cancelled</option>";
        echo "</select>";
        echo "</td>";
        echo "<td><input type='submit' name='submit' value='Update'></td>";
        echo "</tr>";
    }
	echo "</tbody>";
    echo "</table>";
    echo "</form>";
} else {
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
