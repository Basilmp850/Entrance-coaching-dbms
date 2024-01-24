<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rank list</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        form {
            text-align: center;
            margin-top: 35px;
        }

        input {

            padding: 8px;
        }

        button {
            padding: 5px;
            display: inline-block;
            width: 150px;
            font-size: 19px;
            letter-spacing: 2px;
            font-weight: bold;
            margin-left: 102px;
            background-color: green;
            border: 2px solid black;
            color: white;
        }

        .print {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: block;
            margin-top: 50px;
            background-color: blue;
        }

        td,
        th {
            width: 130px;
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid black;

        }

        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;


        }

        .table1 {
            border-spacing: 0;
        }

        .table1 tr {
            background-color: aqua;

        }

        .table1 tr {
            background-color: aqua;

        }

        .table2 tr {

            margin-top: 4px;
        }
        button{
            cursor:pointer;
        }

    </style>
</head>

<body>

    <form action="../PDFfolder/topperpdf.php" method="POST">

        <input name="dateselected" type="date" class="date" />
       
        <button class="generate" name="generate">Generate Batchwise Rank</button>

    </form>
    
</body>

</html>