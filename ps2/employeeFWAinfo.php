<?php include 'header.php';
include 'db.php';
?>

<?php
// Form submit

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
            </thead>

            <?php



              $data = "select * from request 
              
              inner join employee 
              
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