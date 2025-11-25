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

    <?php include 'includes/header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php include 'includes/leftbar.php'; ?>
            </div>
            <div class="col-md-6">
                <!-- Right content goes here -->
				<h1> Search Doctor By Specialities </h1>
				
				
				<form action="fetch_doctors.php" method="post">
            <div class="mb-3">
                <label for="specialty">Select Specialty:</label>
                <select class="form-select" name="specialty" id="specialty" required>
                    <option value="">-- Select Specialty --</option>
                    <?php include 'fetch_specialties.php'; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Show Doctors</button>
        </form>

     
				
				
				
				
			</div>
			
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>
