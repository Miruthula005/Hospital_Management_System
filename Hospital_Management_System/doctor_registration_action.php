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
				<h1> Doctor Registration Status </h1>
<?php
// Include the database connection file
//include 'db_connect.php';

// Function to sanitize user inputs
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Sanitize and validate the submitted form fields
$doc_name = sanitize($_POST["doc_name"]);
$doc_gender = sanitize($_POST["doc_gender"]);
$doc_dob = sanitize($_POST["doc_dob"]);
$doc_designation = sanitize($_POST["doc_designation"]);
$doc_specialization = sanitize($_POST["doc_specialization"]);
$doc_mobile = sanitize($_POST["doc_mobile"]);
$doc_email = sanitize($_POST["doc_email"]);
$doc_username = sanitize($_POST["doc_username"]);
//$doc_password = password_hash($_POST["doc_password"], PASSWORD_DEFAULT);
$doc_password = $_POST["doc_password"];

// Insert the doctor's details into the database
$sql = "INSERT INTO tbl_doctor (doc_name, doc_gender, doc_dob, doc_designation, doc_specialization, doc_mobile, doc_email, doc_username, doc_password) 
        VALUES ('$doc_name', '$doc_gender', '$doc_dob', '$doc_designation', '$doc_specialization', '$doc_mobile', '$doc_email', '$doc_username', '$doc_password')";
if ($conn->query($sql) === TRUE) {
    echo "Doctor registered successfully";
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