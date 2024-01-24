<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fee details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        select,
        button {
            display: inline-block;
        }

        form {
            text-align: center;
            margin-top: 40px;
        }

        button {
            background-color: green;
            font-size: 20px;
            padding: 15px;
            font-weight: bold;
            border: 2px solid black;
            color: white;
        }

        select {

            width: 125px;
            text-align: center;
            padding: 10px;
            font-size: 17px;
            border: 2px solid black;
            margin-right: 97px;
        }

        .feestatusbutton:hover {

            cursor: pointer;
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

        .generatereport {
            background-color: blue;
        }
        button{
            cursor:pointer;
        }
    </style>
</head>

<body>
    <!-- <form action="" method="POST">

        <select name="feesyesorno" class="feesyesorno">
            <option class="yes" value="yes">Paid</option>
            <option class="no" value="no">Not Paid</option>
        </select>
        <button name="feestatusbutton" class="feestatusbutton">Get Fee Status</button>
    </form> -->
    <?php
    include '../database/connect.php';
    if (isset($_POST['feestatusbutton'])) {


        $feestatus =  $_POST['feesyesorno'];

        $sqlselect = "Select STUDENT.name,STUDENT.admno,BATCHES.batchno,STUDENT.feespaid from BATCHES,STUDENT where BATCHES.batchno = STUDENT.batchno and feespaid = '$feestatus'";
        $result = mysqli_query($con, $sqlselect);
        // echo $sqlselect;
        $num_rows = mysqli_num_rows($result); //to get the number of rows of processed result set...
        // echo $num_rows . "<br>";
        if ($result) {
            if ($num_rows == 0) {
                echo "No students with feestatus" . $feestatus . "<br>";
            } else {
                echo "
                    
                  <table class='table1'>
                    <tr>
                    
                      <th>Name</th>
                      <th>Admno</th>
                      <th>BatchNo</th>
                      <th>Fee Status</th>
                    
                    </tr>
                  </table>
                    ";

                echo "<br>";
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $admno = $row['admno'];
                $name = $row['name'];

                $batchno = $row['batchno'];



                $fees = $row['feespaid'];

                // echo $id.'<br>';
                // echo $name.'<br>';
                // echo $salary.'<br>';
                // echo $pf.'<br>';
                // echo "<br>";
                // echo "<br>";

                echo "
                <table class= 'table2'>
                    <tr>
                        
                        <td>" . $name . "</td>
                        <td>" . $admno . "</td>
                        
                        <td>" . $batchno . "</td>
                        <td>" . $fees . "</td>
                        
        
                    </tr>
                </table>
                ";
            }
        } else {
            //echo "Error";
            die(mysqli_error($con));
        }
    }

    ?>

    <form action="../PDFfolder/feepdf.php" method="POST">


        <select name="feesyesorno" class="feesyesorno">
            <option class="yes" value="yes">Paid</option>
            <option class="no" value="no">Not Paid</option>
        </select>
        <button class="generatereport" name="generate">Generate Report</button>


    </form>
    <script>
        const selectedElement = document.querySelector('.feesyesorno');



        const yes = document.querySelector(".yes");
        const no = document.querySelector(".no");
        const sbmtbutton = document.querySelector("button");
        if (selectedElement.value == 'no') {
            no.selected == "true";
        }
        sbmtbutton.addEventListener('click', function() {
            //console.log(selectedElement.innerText);
            console.log(selectedElement.value);


            //if (selectedElement.value =){}
            //selectedElement.textContent = 
        });
    </script>




</body>

</html>