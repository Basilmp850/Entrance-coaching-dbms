<?php
    include '../INCLUDES/navbar.php';
?>

<?php

    include '../database/connect.php';
    if(isset($_GET['deleteid'])){

        $ssn = $_GET['deleteid'];
        $sqldelete = "delete from PROFESSOR where ssn = $ssn";
        
        $result = mysqli_query($con,$sqldelete);
        if($result){
            header('location:../display/professor.php');
        }
        else{
            die(mysqli_error($con));
        }

    }

?>