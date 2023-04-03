<?php include 'supervisor_header.php';
include 'db.php';
session_start();


$fwh = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Flexible Work Hour' 
AND employee.SupervisorID = '$_SESSION[employeeID]'"
;  


$wfh = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Work From Home' 
AND employee.SupervisorID = '$_SESSION[employeeID]'"
;       

$hyb = "select count(request.employeeID) as total from request
inner join employee on employee.employeeID = request.employeeID
inner join department on department.deptID = employee.deptID where request.FWAstatus = 'Accept' and request.workType = 'Hybrid' 
AND employee.SupervisorID = '$_SESSION[employeeID]'";        

$finddeptID="SELECT * FROM employee, department WHERE employeeID = '$_SESSION[employeeID]' AND department.deptID = employee.deptID";

$FWHStatus = mysqli_query($db, $fwh);
$wfhStatus = mysqli_query($db, $wfh);
$hybStatus = mysqli_query($db, $hyb);
$deptID = mysqli_query($db, $finddeptID);

$dailySchedule = "
                select dailySchedule.employeeID, date, workLocation, workHours 
                from dailySchedule
                INNER JOIN employee on employee.employeeID = dailyschedule.employeeID                 
                WHERE employee.deptID = '$_SESSION[deptID]'
                " ;
                
$ds = mysqli_query($db, $dailySchedule);

//echo $dailySchedule;




//echo $_SESSION['employeeID'];


if(isset($_GET['submit']))
{
    $date=$_GET['date'];
    $hyb.=" AND department.deptID = '$_SESSION[deptID]' AND requestDate='$date'";
    $wfh.=" AND department.deptID = '$_SESSION[deptID]' AND requestDate='$date'";
    $fwh.=" AND department.deptID = '$_SESSION[deptID]' AND requestDate='$date'";
    $FWHStatus = mysqli_query($db, $fwh);
    $wfhStatus = mysqli_query($db, $wfh);
    $hybStatus = mysqli_query($db, $hyb);

    $dailySchedule.=" AND date = '$date'";
    $ds=mysqli_query($db,$dailySchedule);

}
?>




<main>
    <hr>
    <div id="EmployeeForm">
        <h3>View  FWA Analytics</h3>
        <hr>


    <form method="GET" action="SupervisorViewFWAAnalytics.php?">
    <div class="form-group input-control">
                    <label for="departmentID"  >Department: 
                      
                        <?php
                            while($row=mysqli_fetch_assoc($deptID)){
                                echo $row['deptID'];
                            };
                            
                            ?>
                        
                    </label>
                    
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
        
        
        
        
        </tr>
        
        
        ";

    }
      ?>

    


    </table>
    </form>

</main>
<br>
<?php include 'footer.php'; ?>