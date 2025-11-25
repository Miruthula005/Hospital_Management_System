<?php
session_start();
include 'db_connect.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userType = $_POST["admin_type"];
	echo $username, $password , $userType ;

    if ($userType == "a") {
        $table = "tbl_admin";
		$admin_type = "a";
		$admin_id = "admin_id";
		echo $query ;
		$query = "SELECT * FROM " . $table . " WHERE admin_username = '" . $username . "' AND admin_password = '" . $password . "'";
    } elseif ($userType == "d") {
        $table = "tbl_doctor";
		$admin_type = "d";
		$admin_id = "doc_id";
		echo $query ;
		$query = "SELECT * FROM " . $table . " WHERE doc_username = '" . $username . "' AND doc_password = '" . $password . "'";
    } elseif ($userType == "p") {
        $table = "tbl_patient";
		$admin_type = "p";
		$admin_id = "pat_id";
		echo $query ;
		$query = "SELECT * FROM " . $table . " WHERE patient_username = '" . $username . "' AND patient_password = '" . $password . "'";
    } else {
        // Invalid user type selected, handle the error
        $errorMessage = "Invalid user type selected.";
        // You can redirect back to the login page with the error message
        header("Location: login.php?error=" . urlencode($errorMessage));
        exit();
    }

echo " <br> Admin id "; echo "$admin_id";

    // Perform the database query to check the username and password
    echo "checked <br>" ;
    echo $query ; 
	$result = $conn->query($query) ;
	echo $result->num_rows ;
	//$result = mysqli_query($conn,$query);

    if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo "<br> resultset " ; echo $row[$admin_id];
		
		echo "login successfull" ;
        // Login successful, redirect to the dashboard
		
        // Set session variables
        $_SESSION["s_admin_type"] = "$admin_type";
		$_SESSION["s_admin_id"] = $row[$admin_id];
		$_SESSION["s_admin_username"] = "$username";
		
		//echo "<br> admin id : " ; echo $_SESSION["s_admin_id"]; echo $_SESSION["s_admin_username"];

        //echo  $_SESSION["s_admin_type"] ;

        header("Location: list_doc_spec.php ");
        exit();
    } else {
		echo "login failed" ;
        // Login failed, redirect back to the login page with the error message
        $errorMessage = "Invalid username or password.";
        header("Location: login.php?error=" . urlencode($errorMessage));
        exit();
    }
}
 mysqli_close($conn);
?>

