<?php include 'supervisor_header.php';
include 'db.php';
session_start(); 

$sql = "SELECT department.deptName
        FROM department
        JOIN employee ON department.deptID = employee.deptID
        WHERE department.deptID = employee.deptID
        AND employee.employeeID = '$_SESSION[employeeID]'";

// Execute query
$result = $db->query($sql);

// Get result
$row = $result->fetch_assoc();
$departmentName = $row['deptName'];

// SQL QUERY FOR EMAIL
$sqlEmail = "SELECT email
        FROM employee
        WHERE employeeID = '$_SESSION[employeeID]'";
// Execute query
$result = $db->query($sqlEmail);

// Get result
$row = $result->fetch_assoc();
$email = $row['email'];



// Print department name
if (isset($_SESSION['employeeID']) && isset($_SESSION['name'])) {
    ?>


<main>
    <hr>
    <h3>Welcome to the Supervisor Dashboard</h3>
    <label for="name"> <?php echo "Supervisor Name : $_SESSION[name] ";?> </label><br><br><br>
    <label for="empID"><?php echo "Supervisor ID : $_SESSION[employeeID] ";?> </label><br><br><br>
    <label for="position">Position: Supervisor</label><br><br><br>
    <label for="email"><?php echo "Email: " . $email;?> </label><br><br><br> 

    <button type="button" class="btn btn-success">Edit Profile</button>


        
</main>
<br>
<?php
 include 'footer.php'; 
}
?>