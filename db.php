<?php


$db= new mysqli("localhost","root","","bit210assg", "3308");

if ($db -> connect_error) {
    echo "Failed to connect to MySQL: " . $db -> connect_error;
    exit();
  }


?>
