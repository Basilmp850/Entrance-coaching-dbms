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
            width: 250px;
        }

        button{
            cursor:pointer;
        }

    </style>
</head>

<body>

    <form action="" method="POST">

        <input name="dateselected" type="date" class="date" />
        <button class="Generate" name="generate">Generate Rank</button>
        <!-- <a href="../PDFfolder/topperpdf.php?date=".$date_selected.""><button class="batchwise rank" name="batchwiserank">Generate Batchwise Rank</button></a> -->

    </form>
    <?php
    include '../database/connect.php';

    if (isset($_POST['generate'])) {
        //admno,name,batch,marks,rank

        $date_selected =  $_POST['dateselected'];

        $sqlselect = "Select distinct marks from STUD_MARKS where dateofexam = '$date_selected'";
        $result = mysqli_query($con, $sqlselect);
        // echo $sqlselect;
        $num_rows = mysqli_num_rows($result); //to get the number of rows of processed result set...
        // echo $num_rows . "<br>";
        if ($num_rows > 0) {
            $rank = 1;
            $marks_array = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $mark = $row['marks'];
                array_push($marks_array, $mark);
            }

            rsort($marks_array);
            // echo var_dump($marks_array);
            foreach ($marks_array as $ind_marks) {
                $sqlinsert = "Update STUD_MARKS set rankstudent=$rank where marks=$ind_marks and dateofexam = '$date_selected'";
                //echo $sqlinsert;
                $result1 = mysqli_query($con, $sqlinsert);
                echo "<br>";
                //echo $result1;
                // if ($result1) {
                    
                //     }
                // } else {

                //     die(mysqli_error($con));
                // }
                $rank++;
            }
            $sqlselect2 = "Select STUDENT.name,STUDENT.admno,BATCHES.batchno,BATCHES.name as batchname,rankstudent,marks FROM STUDENT,BATCHES,STUD_MARKS WHERE STUDENT.admno = STUD_MARKS.admno and STUDENT.batchno = BATCHES.batchno and dateofexam = '$date_selected' order by rankstudent";
            $result2 = mysqli_query($con, $sqlselect2);
            echo "

                                 <table class='table1'>
                                   <tr>
                                     <th>Rank</th>
                                     <th>Name</th>
                                     <th>Admno</th>
                                     
                                     <th>Batch Name</th>
                                     <th>Marks</th>
            
                                   </tr>
                                 </table>
                                   ";

            echo "<br>";

            while ($row = mysqli_fetch_assoc($result2)) {
                        $admno = $row['admno'];
                        $name = $row['name'];

                       // $batchno = $row['batchno'];
                        $batchname = $row['batchname'];
                        $rank1 = $row['rankstudent'];
                        $marks = $row['marks'];



                        

                        // echo $id . '<br>';
                        // echo $name . '<br>';
                        // echo $salary . '<br>';
                        // echo $pf . '<br>';
                        // echo "<br>";
                        // echo "<br>";

                        echo "
                                      <table class= 'table2'>
                                          <tr>
      
                                       <td>" . $rank1 . "</td>
                                          <td>" . $name . "</td>
            
                                          <td>" . $admno . "</td>
                                          <td>" . $batchname . "</td>
                                          
                                          <td>" . $marks . "</td>
            
            
                                        </tr>
                                    </table>
                                    ";

            
          } 
          echo "<a href='../PDFfolder/rankpdf.php?date=".$date_selected."'><button class='print'>PRINT</button></a>";
        }
        else {

            echo "No exam details on the selected date";
        }


        // if ($result) {
        //     if ($num_rows == 0) {
        //         echo "No data found on inputted date <br>";
        //     } else {
        //         echo "

        //               <table class='table1'>
        //                 <tr>

        //                   <th>Name</th>
        //                   <th>Admno</th>
        //                   <th>BatchNo</th>
        //                   <th>Fee Status</th>

        //                 </tr>
        //               </table>
        //                 ";

        //         echo "<br>";
        //     }

        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $admno = $row['admno'];
        //         $name = $row['name'];

        //         $batchno = $row['batchno'];



        //         $fees = $row['feespaid'];

        //         // echo $id.'<br>';
        //         // echo $name.'<br>';
        //         // echo $salary.'<br>';
        //         // echo $pf.'<br>';
        //         // echo "<br>";
        //         // echo "<br>";

        //         echo "
        //             <table class= 'table2'>
        //                 <tr>

        //                     <td>" . $name . "</td>
        //                     <td>" . $admno . "</td>

        //                     <td>" . $batchno . "</td>
        //                     <td>" . $fees . "</td>


        //                 </tr>
        //             </table>
        //             ";
        //     }
        // } else {
        //   <a href="../PDFfolder/topperpdf.php?date=".$date_selected.""><button class="batchwise rank" name="batchwiserank">Generate Batchwise Rank</button></a>  //echo "Error";
        //     die(mysqli_error($con));
        // }
    }
    ?>
</body>

</html>