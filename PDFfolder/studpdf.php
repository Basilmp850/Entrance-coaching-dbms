<?php

use Dompdf\Dompdf;

include '../database/connect.php';
require_once '../dompdf/autoload.inc.php';



if (isset($_POST['generate'])) {

    $admno =  $_POST['admnofrominput'];
    $sqlselect1 = "SELECT name as studname,admno,dob from STUDENT where admno = $admno";
    $result1 = mysqli_query($con, $sqlselect1);
    $sqlselect2 = "SELECT BATCHES.batchno,BATCHES.name as batchname from BATCHES,STUDENT where STUDENT.admno = $admno and STUDENT.batchno = BATCHES.batchno";
    $result2 = mysqli_query($con, $sqlselect2);
    //$num_rows = mysqli_num_rows($result1);
    $sqlselect3 = "SELECT avg(marks) as avgmark,avg(rankstudent) as avgrank from STUD_MARKS WHERE admno = $admno";
    $result3 = mysqli_query($con, $sqlselect3);




    $HTML = '
         <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>studentreport</title>
             <style>
                 p.header{
                    text-align:center;
                    font-size : 40px;
                    margin-bottom : 70px;
                   
                    
                 }
                
                span{
                    margin-left:8%;
                    width: 32%;
                    display: inline-block;
                    
                }
                strong{
                    
                    margin-left: 20px;
                }
                .detailheader{
                    font-size : 25px;
                    margin-left: 5%;
                    margin-top: 60px;
                    margin-bottom: 60px;
                    
                }
                span,strong{

                    font-size:23px;
                }
                
             </style>
         </head>
         ';




    $HTML .= "
            <body>
                <div class = 'container'>
                    <p class = 'header'><u> STUDENT REPORT</u></p>
                </div>
            
        ";

    $HTML .= '<p class = "detailheader"><u>STUDENT</u></p>';
    while ($row = mysqli_fetch_assoc($result1)) {

        $studname = $row['studname'];
        $admno = $row['admno'];
        $dob = $row['dob'];
        // $batchno = $row['batchno'];
        // $batchname = $row['batchname'];
        // $avgmark = $row['avgmark'];
        // $avgrank = $row['avgrank'];


        // echo $id.'<br>';
        // echo $name.'<br>';
        // echo $salary.'<br>';
        // echo $pf.'<br>';
        // echo "<br>";
        // echo "<br>";

        $HTML .= '
        
        <p><span>Name : </span>   <strong> ' . $studname . '</strong></p>
        <p><span>Adm no : </span>  <strong>  ' . $admno . ' </strong></p>
        <p><span>DOB : </span>    <strong>' . $dob . '      </strong></p>
        
        ';
    }

    $HTML .= '<p class = "detailheader"><u>BATCH</u></p>';

    while ($row = mysqli_fetch_assoc($result2)) {

        $batchno = $row['batchno'];
        $batchname = $row['batchname'];

        // $batchno = $row['batchno'];
        // $batchname = $row['batchname'];
        // $avgmark = $row['avgmark'];
        // $avgrank = $row['avgrank'];


        // echo $id.'<br>';
        // echo $name.'<br>';
        // echo $salary.'<br>';
        // echo $pf.'<br>';
        // echo "<br>";
        // echo "<br>";

        $HTML .= '
        
        <p><span>Batch no : </span>  <strong>' . $batchno . '</strong></p>
        <p><span>Batch name : </span>  <strong>' . $batchname . '</strong></p>
       
        
        ';
    }

    $HTML .= '<p class = "detailheader"><u>MARKS</u></p>';
    while ($row = mysqli_fetch_assoc($result3)) {

        $avgmark = $row['avgmark'];
        $avgrank = $row['avgrank'];

        // $batchno = $row['batchno'];
        // $batchname = $row['batchname'];
        // $avgmark = $row['avgmark'];
        // $avgrank = $row['avgrank'];


        // echo $id.'<br>';
        // echo $name.'<br>';
        // echo $salary.'<br>';
        // echo $pf.'<br>';
        // echo "<br>";
        // echo "<br>";

        $HTML .= '
        
        <p><span>Average Mark : </span>  <strong>' . $avgmark . '</strong></p>
        <p><span>Average Rank : </span>  <strong>' . $avgrank . '</strong></p>
        
        
        ';
    }

    $HTML .= '
        
            </body>
            </html>
        ';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($HTML);


    $dompdf->setPaper('A4', 'portrait');


    $dompdf->render();


    $dompdf->stream('studentdetails.pdf', array("Attachment" => false));
}
