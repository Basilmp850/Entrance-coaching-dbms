<?php

use Dompdf\Dompdf;

include '../database/connect.php';
require_once '../dompdf/autoload.inc.php';


if(isset($_GET['date'])){

    $date_selected =  $_GET['date'];
    $dateconverted = date("d/m/Y", strtotime($date_selected));
    $sqlselect1 = "Select STUDENT.name,STUDENT.admno,BATCHES.batchno,BATCHES.name as batchname,rankstudent,marks FROM STUDENT,BATCHES,STUD_MARKS WHERE STUDENT.admno = STUD_MARKS.admno and STUDENT.batchno = BATCHES.batchno and dateofexam = '$date_selected' order by rankstudent";
    $result1 = mysqli_query($con, $sqlselect1);
    // $sqlselect2 = "SELECT BATCHES.batchno,BATCHES.name as batchname from BATCHES,STUDENT where STUDENT.admno = $admno and STUDENT.batchno = BATCHES.batchno";
    // $result2 = mysqli_query($con, $sqlselect2);
    // //$num_rows = mysqli_num_rows($result1);
    // $sqlselect3 = "SELECT avg(marks) as avgmark,avg(rankstudent) as avgrank from STUD_MARKS WHERE admno = $admno";
    // $result3 = mysqli_query($con, $sqlselect3);




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
                
               
                .detailheader{
                    font-size : 25px;
                    margin-left: 5%;
                    margin-top: 60px;
                    margin-bottom: 60px;
                    
                }
                span,strong{

                    display:inline-block;
                    font-size:23px;
                }
                table{
                    text-align:center;
                    margin-top: 70px;
                    
                }
                td,th{

                    padding: 15px;
                }

                .spanstrong{

                    text-align:center;
                }
                
             </style>
         </head>
         ';




    $HTML .= "
            <body>
                <div class = 'container'>
                    <p class = 'header'><u>RANK DETAILS</u></p>
                </div>
            
        ";

    $HTML .= '<p class="spanstrong"><span>Date of exam : </span>  <strong>' . $dateconverted . '</strong></p>';

    $HTML.= "
    
                <table border = '1'>
                
                    <tr>
                        <th>RANK</th>
                        <th>NAME</th>
                        <th>BATCH</th>
                        <th>ADM NO</th>
                        <th>MARKS</th>
                    </tr>


              
    ";
    while ($row = mysqli_fetch_assoc($result1)) {

        $admno = $row['admno'];
        $name = $row['name'];

       // $batchno = $row['batchno'];
        $batchname = $row['batchname'];
        $rank1 = $row['rankstudent'];
        $marks = $row['marks'];


        // echo $id.'<br>';
        // echo $name.'<br>';
        // echo $salary.'<br>';
        // echo $pf.'<br>';
        // echo "<br>";
        // echo "<br>";

        $HTML .= '
        
      
                
                    <tr>
                        <td>'.$rank1.'</td>
                        <td>'.$name.'</td>
                        <td>'.$batchname.'</td>
                        <td>'.$admno.'</td>
                        <td>'.$marks.'</td>
                    </tr>


               
        
        ';
    }

    

    $HTML .= '
        
            </table>
            </body>
            </html>
        ';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($HTML);


    $dompdf->setPaper('A4', 'portrait');


    $dompdf->render();


    $dompdf->stream('studentdetails.pdf', array("Attachment" => false));



}


   