<?php include 'headerEmployee.php';
include 'db.php';
?>

<?php

?>

<main>
    <hr>
    <?php
$empID = $_GET['ID'];
$sid = $_GET['sid'];
    echo"
    <form method='POST' action='updateStatus.php?id=$empID&sid=$sid'>
    ";
    ?>
        <h3>Review FWA Request</h3>
        <hr>
        
        <table class="table">


            <thead>
                <th>Name</th>
                <th>Employee ID</th>
                <th>Request ID</th>
                <th>Status</th>
                <th>Action</th>
                <th>Comment</th>
            </thead>

            <?php



              $data = "select * from request inner join employee 
              
              on request.employeeID = employee.employeeID 
              
              WHERE request.requestID='$sid' 

              AND request.employeeID='$empID'
              
              ";

              $fwaStatus = mysqli_query($db, $data);

              while($printTable = mysqli_fetch_assoc($fwaStatus)){

                echo"
              
                <tr>
              <td> $printTable[name]</td>
              <td> $printTable[employeeID]</td>
              <td> $printTable[requestID]</td>
              <td> $printTable[FWAstatus]</td>
              
              <td>
                    <select class='form-select' name='FWAstatus' id='FWAstatus'>
                        <option selected value='Accept'>Accept</option>
                        <option value='Reject'> Reject </option>
                    </select>
              
              </td>
              <td><input type ='text'  name='comment' id='comment'></td>
              </tr>
              

              
              ";

              }

                   
            
            
            ?>

            

        </table>

        <input type="submit" name="submit" value="Submit">
    </form>         
</main>
<br>
<?php include 'footer.php'; ?>