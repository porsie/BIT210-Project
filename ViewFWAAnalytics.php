<?php include 'header.php';
include 'db.php';
session_start();

$sql = "select * from department";



$result = mysqli_query($db, $sql);
?>




<main>
    <hr>
    <div id="EmployeeForm">
        <h3>View  FWA Analytics</h3>
        <hr>
        <form id="empForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <fieldset class="border p-2">
            <div class="form-group input-control">
                    <label for="status">Please select the department: </label>
                    <select class="form-select" name="deptID" id="deptID">

                        <?php while($row = mysqli_fetch_array($result)):;?>
                        <option><?php echo $row[0];?></option>       
                        <?php endwhile;?>     

                    </select>
                    <p>Error message</p>
                </div>
                
                <div class="form-group input-control">
                    <label for="date">Please select a date: </label>
                    <input type="date" name="date" id="date">
                    <p>Error message</p>
                </div>
                
               
                <input type="submit" name="submitForm" class="btn btn-success" id="submit" value="Check">
            </fieldset>
        </form>


    </div>

<div class="container">
    <div class="fwa"></div>
    <div class="fwa"></div>
    <div class="fwa"></div>
</div>
</main>
<br>
<?php include 'footer.php'; ?>