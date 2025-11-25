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
                
            </div>
            
            <div class="col-md-6">
                <!-- Right content goes here -->
				<h1> Login  </h1>
								
				<form method="POST" action="login_action.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
			<div class="form-check">
                    <input class="form-check-input" type="radio" name="admin_type" id="admin_type" value="a">
                    <label class="form-check-label" for="admin_type">Admin</label>
                </div>
                <label class="form-label">User Type:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin_type" id="admin_type" value="d" checked>
                    <label class="form-check-label" for="admin_type">Doctor</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin_type" id="admin_type" value="p">
                    <label class="form-check-label" for="admin_type">Patient</label>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
				
				
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
