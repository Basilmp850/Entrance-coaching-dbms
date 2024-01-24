<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "Basil@123";
    $db = "SHARON";
    
    $con = new mysqli($dbhost,$dbuser,$dbpass,$db);

    // if($con){
    //     echo "Connection established";
    //  }
    if(!$con){
        die(mysqli_error($con));
    }

    // header('location:display.php');
    
?>

