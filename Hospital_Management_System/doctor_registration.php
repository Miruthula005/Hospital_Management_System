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

    <?php include 'includes/header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
            
		<div class="col-md-6">
                <!-- Right content goes here -->
        <h2>Doctor Registration Form</h2>
        <form method="POST" action="doctor_registration_action.php">
            <div class="mb-3">
                <label for="doc_name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="doc_name" name="doc_name" required>
            </div>
            <div class="mb-3">
                <label for="doc_gender" class="form-label">Gender:</label>
                <select class="form-select" id="doc_gender" name="doc_gender" required>
                    <option value="">-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="doc_dob" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="doc_dob" name="doc_dob" required>
            </div>
            <div class="mb-3">
                <label for="doc_designation" class="form-label">Designation:</label>
                <input type="text" class="form-control" id="doc_designation" name="doc_designation" required>
            </div>
            <div class="mb-3">
                <label for="doc_specialization" class="form-label">Specialization:</label>
                <select class="form-select" id="doc_specialization" name="doc_specialization" required>
                    <option value="">-- Select Specialization --</option>
                    <?php include 'fetch_specialties.php'; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="doc_mobile" class="form-label">Mobile:</label>
                <input type="text" class="form-control" id="doc_mobile" name="doc_mobile" required>
            </div>
            <div class="mb-3">
                <label for="doc_email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="doc_email" name="doc_email">
            </div>
            <div class="mb-3">
                <label for="doc_username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="doc_username" name="doc_username" required>
            </div>
            <div class="mb-3">
                <label for="doc_password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="doc_password" name="doc_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

			
			
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
