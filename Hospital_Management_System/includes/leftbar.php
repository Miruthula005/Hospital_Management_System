 <?php
    //session_start();
    //echo $_SESSION['s_admin_type']; 
    //$_SESSION['s_admin_type'] = $admin_type;
	$admin_type = $_SESSION['s_admin_type'];
	//echo $_SESSION["s_admin_id"];
   ?>
   
  <!--<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column"> -->
 
 
<?php if ($admin_type == 'a') { ?>
 

<nav class="nav flex-column">
    
	<a class="nav-link" href="list_doc_spec.php">Dashboard</a>
    <a class="nav-link" href="doctor_registration.php">Doctor Signup</a>
    <a class="nav-link" href="patient_registration.php">Patient Signup</a>
    <a class="nav-link" href="list_doc_spec.php">Get Doctor's Appointment</a>
    <a class="nav-link" href="list_doc_spec.php">Search Doctor by Speciality</a>
   	<a class="nav-link" href="search_patient.php">Search Patient</a>
</nav>
 <?php } ?>

 <?php if ($admin_type == 'd') { ?>

<nav class="nav flex-column">
    <a class="nav-link" href="list_doc_spec.php">Dashboard</a>
    <a class="nav-link" href="search_patient.php">Search Patient</a>
    <a class="nav-link" href="doc_view_appointment.php">Manage Appointments</a>
	<a class="nav-link" href="list_doc_spec.php">Search Doctor by Speciality</a>
</nav>
 <?php } ?>
 
  <?php if ($admin_type == 'p') { ?>

<nav class="nav flex-column">
    <a class="nav-link" href="list_doc_spec.php">Dashboard</a>
    <a class="nav-link" href="list_doc_spec.php">Get Doctor's Appointment</a>
    <a class="nav-link" href="list_doc_spec.php">Search Doctor by Speciality</a>
    <a class="nav-link" href="pat_view_appointment.php">View Appointment Status</a>
    
</nav>
 <?php } ?>
 
