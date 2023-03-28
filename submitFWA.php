<?php include 'employee_header.php';
include 'db.php';
session_start();
$randomID = 'S' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
$employeeid = $_SESSION['employeeID'];
$selectRequest ="select * from request where requestID = '$randomID' ";
$array = mysqli_query($db, $selectRequest);
?>

<?php
// Form submit
if (isset($_POST['submitForm'])) 
{
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $localDate = date ('d-m-y');

    $convertedDate =date ('Y-m-d', strtotime($localDate)); 



    $workType = $_POST["workType"];
    $fwaDescription = $_POST["description"];
    $reason = $_POST["reason"];

    if(mysqli_num_rows($array)>0){

        $randomID = 'S' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        

    }

    

    $sql = "insert into request(requestID, employeeID,requestDate, workType, fwa_description, reason, FWAstatus) 
        values ('$randomID', '$employeeid', '$convertedDate', '$workType', '$fwaDescription' , '$reason', 'Pending')";

    $result = mysqli_query($db, $sql);

    header('location: employeeHome.php');

    

    

    

    
}

?>

<main>
    <hr>
    <div id="EmployeeForm">
        <h3>Submit FWA Request</h3>
        <hr>
        <form id="empForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <fieldset class="border p-2">
                <div class="form-group input-control">
                    <label for="empID">Please select the work type: </label>
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
                    <input type="text" class="form-control form-control-sm" name="description" id="description">
                    <p>Error message</p>
                </div>
                <div class="form-group input-control">
                    <label for="pw">Reason </label>
                    <input type="text" class="form-control form-control-sm" name="reason" id="reason">
                    <p>Error message</p>
                </div>
                
               
                <input type="submit" name="submitForm" class="btn btn-success" id="submit">
            </fieldset>
        </form>
    </div>
</main>
<br>
<?php include 'footer.php'; ?>