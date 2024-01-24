<?php

use Dompdf\Dompdf;

include '../database/connect.php';
require_once '../dompdf/autoload.inc.php';



if (isset($_POST['generate'])) {

    $empssn =  $_POST['empssnfrominput'];








    $sqlselect1 = "SELECT * from DEPENDENT where ssn = '$empssn'";
    $result1 = mysqli_query($con, $sqlselect1);
   
    $num_rows = mysqli_num_rows($result1);
    
    $id = 0;




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

                 .container{
                    margin-top: 20px;
                 }
                
                span{
                    margin-left:8%;
                    width: 22%;
                    display: inline-block;
                    
                }
                strong{
                    margin-left: 15px;
                }
                .detailheader{
                    font-size : 25px;
                    margin-left: 5%;
                    margin-top: 30px;
                    
                }
                p{
                    margin-left: 5%;
                    font-size: 20px;
                }

                .details{

                    margin-top: 13px;
                }
                
             </style>
         </head>
         ';




    $HTML .= "
            <body>
                <div class = 'container'>
                    <p class = 'header'><u> DEPEDENTS DETAILS</u></p>
                
            
        ";

    $HTML .= "<p class = 'detailheader'>Employee SSN : $empssn</p>";
    $HTML .= "<p class = 'detailheader'>No of dependents : $num_rows</p>";
   
    while ($row = mysqli_fetch_assoc($result1)) {
        $id++;
        $name = $row['name'];
        $relation = $row['relation'];
        $age = $row['age'];
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
        $HTML .= "<div class = 'details'>";
        $HTML .= '
        <p>'.$id.').</p>
        <p><span>NAME </span> :  <strong> ' . $name . '</strong></p>
        <p><span>ADM NO </span> : <strong>  ' . $relation . ' </strong></p>
        <p><span>DOB </span> :   <strong>' . $age . '      </strong></p>
        
        ';
        $HTML .= "</div>";
    }
    

    // $HTML .= '<p class = "detailheader"><u>BATCH</u></p>';

    // while ($row = mysqli_fetch_assoc($result2)) {

    //     $batchno = $row['batchno'];
    //     $batchname = $row['batchname'];

    //     // $batchno = $row['batchno'];
    //     // $batchname = $row['batchname'];
    //     // $avgmark = $row['avgmark'];
    //     // $avgrank = $row['avgrank'];


    //     // echo $id.'<br>';
    //     // echo $name.'<br>';
    //     // echo $salary.'<br>';
    //     // echo $pf.'<br>';
    //     // echo "<br>";
    //     // echo "<br>";

    //     $HTML .= '
        
    //     <p><span>BATCH NO </span> : <strong>' . $batchno . '</strong></p>
    //     <p><span>BATCH NAME </span> : <strong>' . $batchname . '</strong></p>
       
        
    //     ';
    // }

    // $HTML .= '<p class = "detailheader"><u>MARKS</u></p>';
    // while ($row = mysqli_fetch_assoc($result3)) {

    //     $avgmark = $row['avgmark'];
    //     $avgrank = $row['avgrank'];

    //     // $batchno = $row['batchno'];
    //     // $batchname = $row['batchname'];
    //     // $avgmark = $row['avgmark'];
    //     // $avgrank = $row['avgrank'];


    //     // echo $id.'<br>';
    //     // echo $name.'<br>';
    //     // echo $salary.'<br>';
    //     // echo $pf.'<br>';
    //     // echo "<br>";
    //     // echo "<br>";

    //     $HTML .= '
        
    //     <p><span>AVERAGE MARKS</span> : <strong>' . $avgmark . '</strong></p>
    //     <p><span>AVERAGE RANK </span> : <strong>' . $avgrank . '</strong></p>
        
        
    //     ';
    // }

    $HTML .= '
            </div>
            </body>
            </html>
        ';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($HTML);


    $dompdf->setPaper('A4', 'portrait');


    $dompdf->render();


    $dompdf->stream('studentdetails.pdf', array("Attachment" => false));
}
