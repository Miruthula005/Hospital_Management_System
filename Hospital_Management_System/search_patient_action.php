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

<?php include 'db_connect.php'; ?>
<!-- TOP Header -->
    <?php include 'includes/header.php'; ?>
    
	
    <div class="container-fluid">

        <div class="row">
		<!-- LEFT Header -->
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
			
		<!-- RIGHT Header -->
            <div class="col-md-9">
                <!-- Right content goes here -->
				<h1> Matching Patients - Details </h1>
	<?php			
					if (isset($_GET['patient_name'])) {
    $patient_name = $_GET['patient_name'];
	$patient_name = "%" . $patient_name . "%";

    // Query the patients that match the typed name (using LIKE operator)
    $sql = "SELECT pat_id, pat_name, pat_gender, pat_dob, pat_phone, pat_email
            FROM tbl_patient
            WHERE pat_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $patient_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any matching patients
    if ($result->num_rows > 0) {
        //echo "<h2>Matching Patients</h2>";
        echo "<div class='table-responsive'>";
         echo "<table class='table table-bordered'>";
         echo "<thead>";
        echo "<tr><th>Patient ID</th><th>Patient Name</th><th>Gender</th><th>Date of Birth</th><th>Phone</th><th>Email</th></tr>";
		echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['pat_id'] . "</td>";
            echo "<td>" . $row['pat_name'] . "</td>";
            echo "<td>" . $row['pat_gender'] . "</td>";
            echo "<td>" . $row['pat_dob'] . "</td>";
            echo "<td>" . $row['pat_phone'] . "</td>";
            echo "<td>" . $row['pat_email'] . "</td>";
            echo "</tr>";
        }
		echo "<tbody>";
        echo "</table>";
    } else {
        echo "No matching patients found.";
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
