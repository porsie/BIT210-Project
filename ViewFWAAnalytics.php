<?php include 'supervisor_header.php';
include 'db.php';
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
                        <option selected value="dept0"> Department </option>
                        <option value="Approve"> D0001 </option>
                        <option value="Pending"> D0002 </option>
                        
                    </select>
                    <p>Error message</p>
                </div>
                
                <div class="form-group input-control">
                    <label for="date">Please select a date: </label>
                    <input type="date" name="date" id="date">
                    <p>Error message</p>
                </div>
                
               
                <input type="submit" name="submitForm" class="btn btn-success" id="submit">
            </fieldset>
        </form>

        <div class="fav">
            
        </div>
    </div>
</main>
<br>
<?php include 'footer.php'; ?>