<?php include 'hradmin_header.php';
include 'db.php';
session_start();

$sql = "select * from department";



$fwh = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Flexible Work Hour'"
;  


$wfh = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Work From Home'"
;       

$hyb = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Hybrid'";        



$FWHStatus = mysqli_query($db, $fwh);
$wfhStatus = mysqli_query($db, $wfh);
$hybStatus = mysqli_query($db, $hyb);

$dailySchedule = "select employeeID, date, workLocation, workHours from dailySchedule";
$ds = mysqli_query($db, $dailySchedule);

$result = mysqli_query($db, $sql);



if(isset($_GET['submit']))
{
    $deptID=$_GET['deptID'];
    $date=$_GET['date'];
    $hyb.=" AND department.deptID = '$deptID' AND requestDate='$date'";
    $wfh.=" AND department.deptID = '$deptID' AND requestDate='$date'";
    $fwh.=" AND department.deptID = '$deptID' AND requestDate='$date'";
    $FWHStatus = mysqli_query($db, $fwh);
    $wfhStatus = mysqli_query($db, $wfh);
    $hybStatus = mysqli_query($db, $hyb);

    $dailySchedule.=" WHERE date = '$date'";
    $ds=mysqli_query($db,$dailySchedule);
    


}
?>




<main>
    <hr>
    <div id="EmployeeForm">
        <h3>View  FWA Analytics</h3>
        <hr>


    <form method="GET" action="HRViewFWAAnalytics.php">
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
                
               
                <input type="submit" name="submit" class="btn btn-success" id="submit" value="Check">
                <br><br>


    </div>

    <table class="table">

    <thead>
        <th>Flexible Working Hours</th>
        <th>Work From Home</th>
        <th>Hybrid</th>
    </thead>

    <?php

    while($printTable = mysqli_fetch_assoc($FWHStatus)){

        echo"
      
        <tr>
      <td> $printTable[total]</td>
    

      
      ";

      }
      
    while($printTable = mysqli_fetch_assoc($wfhStatus)){

        echo"
      
      <td> $printTable[total]</td>
    


      
      ";

      }

      
    while($printTable = mysqli_fetch_assoc($hybStatus)){

        echo"
      

      <td> $printTable[total]</td>
    

      </tr>

      
      ";

      }


      

    
    ?>

    <form>



    </table>

    <table class="table">

    <h3>Employee Daily Schedule</h3>
        <thead>
            <th>Employee ID</th>
            <th>Work Location</th>
            <th>Work Hours</th>
    </thead>

    
    <?php

    while($printTable = mysqli_fetch_assoc($ds)){
        echo"

        <tr>
        
        <td>$printTable[employeeID]</td>
        <td>$printTable[workLocation]</td>
        <td>$printTable[workHours]</td>
        
        
        
        
        </td>
        
        
        ";

    }
      ?>

    


    </table>
    </form>

</main>
<br>
<?php include 'footer.php'; ?>