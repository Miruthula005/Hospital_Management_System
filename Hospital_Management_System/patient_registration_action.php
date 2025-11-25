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
				<h1> Patient Appointment Status </h1>
<?php
// Include the database connection file
include 'db_connect.php';

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Sanitize and validate the submitted form fields
$pat_name = sanitize($_POST["pat_name"]);
$pat_dob = sanitize($_POST["pat_dob"]);
$pat_gender = sanitize($_POST["pat_gender"]);
$pat_address = sanitize($_POST["pat_address"]);
$pat_phone = sanitize($_POST["pat_phone"]);
$pat_email = sanitize($_POST["pat_email"]);
$patient_username = sanitize($_POST["patient_username"]);
$patient_password = sanitize($_POST["patient_password"]);

// Insert the patient's details into the database
$sql = "INSERT INTO tbl_patient (pat_name, pat_dob, pat_gender, pat_address, pat_phone, pat_email, patient_username, patient_password)
        VALUES ('$pat_name', '$pat_dob', '$pat_gender', '$pat_address', '$pat_phone', '$pat_email', '$patient_username', '$patient_password')";
if ($conn->query($sql) === TRUE) {
    echo "Patient registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

		</div>
				
				
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>