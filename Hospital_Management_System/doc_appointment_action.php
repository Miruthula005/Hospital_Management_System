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

				if (isset($_POST['submit'])) {
					// Get the appointment statuses from the form submission
					$appointments = $_POST['status'];

					// Prepare the SQL statement for updating the appointment status
					$sql = "UPDATE tbl_appointment SET appoint_status = ? WHERE appoint_id = ?";
					$stmt = $conn->prepare($sql);

					// Iterate over each appointment and update the status
					foreach ($appointments as $appoint_id => $status) {
						// Bind the parameters
						$stmt->bind_param("si", $status, $appoint_id);

						// Execute the update statement
						if ($stmt->execute()) {
							echo "Appointment updated successfully.";
						} else {
							echo "Failed to update appointment.";
						}
					}

					// Close the prepared statement
					$stmt->close();
				} else {
					echo "Invalid request.";
				}

				// Close the database connection
				$conn->close();
?>
				
				
            </div>
			
			
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
