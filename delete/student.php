<?php
    include '../INCLUDES/navbar.php';
?>

<?php

    include '../database/connect.php';
    if(isset($_GET['deleteid'])){

        $admno = $_GET['deleteid'];
        $sqldelete = "delete from STUDENT where admno= $admno";
        
        $result = mysqli_query($con,$sqldelete);
        if($result){
            header('location:../display/student.php');
        }
        else{
            die(mysqli_error($con));
        }

    }

?>