<?php include 'header.php';
include 'db.php';
?>

<?php
// Form submit
if (isset($_POST['submitForm'])) 
{
    $workType = filter_input(INPUT_POST,'Work-Type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fwaDescription = filter_input(INPUT_POST,'fwaDescription',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fwaReason = filter_input(INPUT_POST,'fwaReason',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sql = "INSERT INTO FWA (workType, fwaDescription, fwaReason) 
        VALUES ('$workType', '$pw', '$fwaDescription', '$fwaReason')";
        
    if (mysqli_query($db, $sql)) {
        // success
        header('Location: HRAdminDashBoard.php');
    } else {
        // error
        echo 'Error: ' . mysqli_error($db);
    }
}
?>

<main>
    <hr>
    <div id="EmployeeForm">
        <h3>Review FWA Request</h3>
        <hr>
        <form id="empForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <fieldset class="border p-2">
                <div class="form-group input-control">
                    <label for="empID">Please select the employee  ID: </label>
                    <select class="form-select" name="workType" id="workType">
                        <option selected value="wokType0"> Work Type </option>
                        <option value="Flexible Work Hour"> Flexible Work Hour </option>
                        <option value="Work From Home"> Work From Home </option>
                        <option value="Hybrid"> Hybrid</option>
                    </select>
                    <p>Error message</p>
                </div>
                <div class="form-group input-control">
                    <label for="fwaDescription">Description </label>
                    <input type="text" class="form-control form-control-sm" name="EmployeeID" id="EmployeeID">
                    <p>Error message</p>
                </div>
                <div class="form-group input-control">
                    <label for="pw">Reason </label>
                    <input type="text" class="form-control form-control-sm" name="pw" id="pw">
                    <p>Error message</p>
                </div>
                
               
                <input type="submit" name="submitForm" class="btn btn-success" id="submit">
            </fieldset>
        </form>
    </div>
</main>
<br>
<?php include 'footer.php'; ?>