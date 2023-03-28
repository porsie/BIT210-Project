<?php
include('db.php');

if(isset($_POST['submit']))
{
    $id=$_GET['id'];
    $sid=$_GET['sid'];
    $sql =" UPDATE request SET FWAstatus = '$_POST[FWAstatus]' WHERE employeeID = '$id' AND requestID= '$sid'";
    $result = mysqli_query($db,$sql);
    echo $sql;

    $sql2 =" UPDATE comment SET comment = '$_POST[comment]' WHERE employeeID = '$id' AND requestID= '$sid'";
    $result2 = mysqli_query($db,$sql2);

    header('location:ReviewFWARequest.php?');
}
?>