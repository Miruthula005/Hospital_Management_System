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
				<h1> Appointment Status </h1>
				
				<?php
						// Assuming you have already established a database connection

						$doctor_id = $_POST['doctor_id'];
						$start_dt_time = $_POST['start_dt_time'];
						$end_dt_time = $_POST['end_dt_time'];
						$appoint_reason = $_POST['appoint_reason'];
						$pat_id = $_SESSION['s_admin_id'];
						$status = 'Pending';
						// Prepare and execute the SQL statement
						$sql = "INSERT INTO tbl_appointment (pat_id, doc_id, start_dt_time, end_dt_time, appoint_reason, appoint_status) VALUES (?, ?, ?, ?, ?, ?)";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("iissss", $pat_id, $doctor_id, $start_dt_time, $end_dt_time, $appoint_reason, $status);
						$status = 'Pending';
						$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    // Appointment registration successful
    // You can redirect to a success page or display a success message
    echo "Appointment registered successfully!";
} else {
    // Appointment registration failed
    // You can redirect back to the registration form with an error message or handle the error accordingly
    echo "Failed to register appointment. Please try again.";
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
