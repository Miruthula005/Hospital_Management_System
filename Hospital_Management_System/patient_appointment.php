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
    

    <div class="container-fluid">

        <div class="row">
		<!-- LEFT Header -->
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
			
		<!-- RIGHT Header -->
            <div class="col-md-6">
                <!-- Right content goes here -->
				<h1> Register Appointment With Doctor </h1>
				
			<form method="POST" action="patient_appointment_action.php">
			<!-- Hidden field to pass the doctor_id -->
			<input type="hidden" name="doctor_id" value="<?php echo $_GET['doc_id']; ?>">

            
			
            <div class="mb-3">
                <label for="start_dt_time" class="form-label">Start Date and Time:</label>
                <input type="datetime-local" class="form-control" id="start_dt_time" name="start_dt_time" required>
            </div>
            <div class="mb-3">
                <label for="end_dt_time" class="form-label">End Date and Time:</label>
                <input type="datetime-local" class="form-control" id="end_dt_time" name="end_dt_time" required>
            </div>
            <div class="mb-3">
                <label for="appoint_reason" class="form-label">Appointment Reason:</label>
                <input type="text-area" class="form-control" id="appoint_reason" name="appoint_reason" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
			
        </form>
				
            </div>
			
			
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
