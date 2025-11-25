
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet />
    <link rel="stylesheet" href="css/style.css" rel="stylesheet>
</head>
<body>

<?php include 'db_connect.php'; ?>
<?php include 'includes/header.php';  ?>
  
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
        <div class="col-md-9">
                <!-- Right content goes here -->
        <h3>Doctor Search result <br></h3>
		
 <?php 
 
 // Fetch the specialty details from the lookup table
$sql_specialty = "SELECT * FROM tbl_specialties";
$result_specialty = $conn->query($sql_specialty);

$specialties = array();
if ($result_specialty) {
    // Create an associative array to store the specialty details
    
    while ($row_specialty = $result_specialty->fetch_assoc()) {
        $specialties[$row_specialty['spec_id']] = $row_specialty['spec_details'];
    }
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a specialty is selected
    if (!empty($_POST["specialty"])) {
     

        // Create connection
        //$conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Sanitize the selected specialty value
        $specialty = $_POST["specialty"];
		//echo " Posted speciality is $specialty";
        $specialty = $conn->real_escape_string($specialty);

        // Fetch doctors matching the selected specialty
        $sql = "SELECT d.doc_id, d.doc_name, d.doc_specialization, d.doc_mobile
                FROM tbl_doctor d
                INNER JOIN tbl_specialties s ON d.doc_specialization = s.spec_id
                WHERE s.spec_id = '$specialty'";
			//echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //echo "<h3>Doctor Search result</h3>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
			echo "<th>Doctor ID</th>";
            echo "<th>Doctor Name</th>";
            echo "<th>Specialty</th>";
            echo "<th>Mobile</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
				$doctor_id = $row["doc_id"];
                $doctor_name = $row["doc_name"];
                //$specialty = $row["doc_specialization"];
                $specialty = $specialties[$row['doc_specialization']];
                $doctor_mobile = $row["doc_mobile"];
                echo "<tr>";
				
				$admin_type = $_SESSION['s_admin_type'];
				if ($admin_type == 'a') {
				echo "<td>$doctor_id</td>";
				
				 } else { 
				echo "<td><a  href=patient_appointment.php?doc_id=$doctor_id>$doctor_id</td>";
				} 
				
                //echo "<td><a  href=patient_appointment.php?doc_id=$doctor_id>$doctor_id</td>";
                echo "<td>$doctor_name</td>";
                echo "<td>$specialty</td>";
               // echo "<td>. $specialties[$row['doc_specialization']] .";
                echo "<td>$doctor_mobile</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>No doctors found for the selected specialty</p>";
        }

        // Close connection
        $conn->close();
    }
}
?>
	
	</div>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
