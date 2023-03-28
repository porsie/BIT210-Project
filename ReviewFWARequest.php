<?php include 'header.php';
include 'db.php';
?>

<?php
// Form submit

?>

<main>
    <hr>
    <div id="EmployeeForm">
        <h3>Review FWA Request</h3>
        <hr>
        
        <table class="table">


            <thead>
                <th>Name</th>
                <th>Employee ID</th>
                <th>Request ID</th>
                <th>Status</th>
            </thead>

            <?php

              $data = "select * from request 
              
              inner join employee 
              
              on request.employeeID = employee.employeeID 
              
              where FWAstatus = 'Pending' ";

              $fwaStatus = mysqli_query($db, $data);

              while($printTable = mysqli_fetch_assoc($fwaStatus)){

                echo"
              
                <tr>
              <td> $printTable[name]</td>
              <td> <a href = 'employeeFWAinfo.php?ID=$printTable[employeeID]&sid=$printTable[requestID]'>$printTable[employeeID]</td>
              <td> $printTable[requestID]</td>
              <td> $printTable[FWAstatus]</td>


      

              
     
              </tr>


              
              
        
              
              ";

              }

              
              
              


            
            
            ?>

            

        </table>
    </div>
</main>
<br>
<?php include 'footer.php'; ?>