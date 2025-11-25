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
				<h1> Patient registration form </h1>
				
        <form method="POST" action="patient_registration_action.php">
            <div class="mb-3">
                <label for="pat_name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="pat_name" name="pat_name" required>
            </div>
            <div class="mb-3">
                <label for="pat_dob" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="pat_dob" name="pat_dob" required>
            </div>
            <div class="mb-3">
                <label for="pat_gender" class="form-label">Gender:</label>
                <select class="form-select" id="pat_gender" name="pat_gender" required>
                    <option value="">-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pat_address" class="form-label">Address:</label>
                <textarea class="form-control" id="pat_address" name="pat_address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="pat_phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="pat_phone" name="pat_phone" required>
            </div>
            <div class="mb-3">
                <label for="pat_email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="pat_email" name="pat_email">
            </div>
            <div class="mb-3">
                <label for="patient_username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="patient_username" name="patient_username" required>
            </div>
            <div class="mb-3">
                <label for="patient_password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="patient_password" name="patient_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" onclick="return validatePasswords()">Register</button>
        </form>
    </div>
   
    <script>
	// AJAX call to check username uniqueness
        $('#patient_username').on('keyup', function() {
            var username = $(this).val();
            $.ajax({
                url: 'check_pat_username.php',
                type: 'POST',
                data: { username: username },
                success: function(response) {
                    if (response === 'exists') {
                        $('#username-validation-message').html('<span style="color: red;">Username already exists.</span>');
                    } else {
                        $('#username-validation-message').empty();
                    }
                }
            });
        });
	
	
        function validatePasswords() {
            var password = document.getElementById("patient_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
		
    </script>
			
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
