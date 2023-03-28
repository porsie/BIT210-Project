<?php

<<<<<<< Updated upstream
$db= new mysqli("localhost","root","","mywebpro", "3308");
=======
$db= new mysqli("localhost","root","","bit210assg", "3308");
>>>>>>> Stashed changes

if ($db -> connect_error) {
    echo "Failed to connect to MySQL: " . $db -> connect_error;
    exit();
  }

?>