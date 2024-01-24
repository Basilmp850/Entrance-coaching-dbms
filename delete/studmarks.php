<?php
    include '../INCLUDES/navbar.php';
?>

<?php

    include '../database/connect.php';
    if(isset($_GET['deleteid'])){

        $uniqueid = $_GET['deleteid'];
        $sqldelete = "delete from STUD_MARKS where uniqueid = $uniqueid";
        
        $result = mysqli_query($con,$sqldelete);
        if($result){
            header('location:../display/studmarks.php');
        }
        else{
            die(mysqli_error($con));
        }

    }

?>