<?php include 'header.php';
include 'db.php';
session_start(); 

if (isset($_SESSION['employeeID']) && isset($_SESSION['name'])) {
    ?>


<main>
    <hr>
    <h3>Welcome to the Employee Dashboard</h3>
    <label for="name"> <?php echo "Employee Name : $_SESSION[name] ";?> </label><br><br><br>
    <label for="empID"><?php echo "Employee ID : $_SESSION[employeeID] ";?> </label><br><br><br>
    <label for="position">Position: Employee</label><br><br><br> 
    <label for="email">Email: HRAdmin@gmail.com </label><br><br><br> //email need retrieve from database

    <button type="button" class="btn btn-success">Edit Profile</button>



        
</main>
<br>
<?php
 include 'footer.php'; 
}
?>