<?php include 'supervisor_header.php';
include 'db.php';
session_start(); 

if (isset($_SESSION['employeeID']) && isset($_SESSION['name'])) {
    ?>


<main>
    <hr>
    <h3>Welcome to the Supervisor Dashboard</h3>
    <label for="name"> <?php echo "Supervisor Name : $_SESSION[name] ";?> </label><br><br><br>
    <label for="empID"><?php echo "Supervisor ID : $_SESSION[employeeID] ";?> </label><br><br><br>
    <label for="position">Position: Supervisor</label><br><br><br>
    <label for="email">Email: HRAdmin@gmail.com </label><br><br><br> // email need retrieve from database

    <button type="button" class="btn btn-success">Edit Profile</button>

    <a href="ViewFWAAnalytics.php">View FWA Analytics</a>
    <a href="ReviewFWARequest.php">Review FWA Request</a>
    <a href="#">Review Employee Schedule</a>

        
</main>
<br>
<?php
 include 'footer.php'; 
}
?>