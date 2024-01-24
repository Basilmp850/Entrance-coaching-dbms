<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dependents details</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .generatereport {
            background-color: blue;
            color: white;
            padding: 10px;
            border: 2px solid black;
        }

        input {

            padding:10px;
            width: 60%;
            border: 2px solid black;
        }

        .container{
            margin-top:150px;

        }

        form{
            text-align: center;
            width: 500px;
            margin-left: auto;
            margin-right:auto;
        }
        button{
            cursor:pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="../PDFfolder/deppdf.php" method = "POST">
            <input type="text" placeholder="Enter employee ssn" name="empssnfrominput">
            
                 
            <button class="generatereport" name = "generate">Generate Report</button>
            
           
        </form>
        <!-- <td><a href='../update/studmarks.php?updateid=".$uniqueid."'><button class='update'>Update</button></a></td> -->
    </div>
</body>

</html>