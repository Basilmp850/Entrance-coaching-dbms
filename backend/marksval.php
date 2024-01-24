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

    $admno =  $_POST['admno'];
    $marks = $_POST['marks'];
    $current_date = date("Y-m-d");


   

    if (empty($admno) or empty($marks)) {
        echo "Form field is empty";
    } else {

      $flag = 0;
      //  echo $current_date;
       $sqlselect = "Select admno from STUD_MARKS where dateofexam='$current_date'";
       $result1 = mysqli_query($con, $sqlselect);
       $num_rows = mysqli_num_rows($result1);
       while ($row = mysqli_fetch_assoc($result1)) {
           $indadmno = $row['admno'];//indadmno is fetched from EXISISTING STUD_MARKS TABLE
           if($indadmno == $admno){
                echo "<p>The marks cannot be inserted because it is already inserted</p>";
                echo "<a href='../frontend/studmarks.php'><button>Go back</button></a>";
                $flag = 1;
                break;

           }
        }
       
        if($flag == 0){

            $sqlinsert = "insert into  STUD_MARKS  (admno,marks,dateofexam)values ('$admno','$marks','$current_date')";
            $result = mysqli_query($con, $sqlinsert);
            if ($result) {
                echo "<div class = 'maincontainer'>";
                echo "<strong>Data Inserted Successfully</strong>";
                echo "<a href='../frontend/studmarks.php'><button class='goback'>Go back</button></a>";
                echo "</div>";
            } else {
    
                die(mysqli_error($con));
            }

        }
        
      
    }
}

?>
