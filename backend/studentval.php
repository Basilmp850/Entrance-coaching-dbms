<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentval</title>
    <style>
        button {
            display: block;
            background-color: green;
            width: 200px;
            padding: 10px;
            cursor: pointer;
            margin-left:auto;
            margin-right: auto;
            
            
        }
        .goback{
            margin-top: 40px;
            color:white;
            border-radius: 2px solid white;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .maincontainer{

            text-align: center;
        }

        strong{
            font-size:2rem;
        }
    </style>

</head>

<body>


</body>

</html>

<?php

include '../database/connect.php';

if (isset($_POST['submit'])) {

    $name =  $_POST['name'];
    $dob = $_POST['dob'];
    $batchno = $_POST['batchno'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $fees = $_POST['fees'];



    if (empty($name) or empty($dob) or empty($batchno) or empty($age) or empty($phone) or empty($sex) or empty($fees)) {
        echo "Form field is empty";
    } else {


        $sqlinsert = "insert into  STUDENT (name,dob,batchno,age,phone,sex,feespaid) values ('$name','$dob','$batchno','$age','$phone','$sex','$fees')";
        $result = mysqli_query($con, $sqlinsert);
        if ($result) {
            echo "<div class = 'maincontainer'>";
            echo "<strong>Data Inserted Successfully</strong>";
            echo "<a href='../frontend/student.php'><button class='goback'>Go back</button></a>";
            echo "</div>";
        } else {

            die(mysqli_error($con));
        }
    }
}

?>