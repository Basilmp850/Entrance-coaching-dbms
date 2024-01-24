<?php

use Dompdf\Dompdf;

include '../database/connect.php';
require_once '../dompdf/autoload.inc.php';



if (isset($_POST['generate'])) {

    $feestatus =  $_POST['feesyesorno'];
   


    //$feedisplay;
    if($feestatus === 'yes'){

        $feedisplay = 'PAID';
    }
    else{
        $feedisplay = 'NOT PAID';
    }





    $sqlselect1 = "Select STUDENT.name,STUDENT.admno,BATCHES.batchno,BATCHES.name as batchname,STUDENT.feespaid from BATCHES,STUDENT where BATCHES.batchno = STUDENT.batchno and feespaid = '$feestatus'";
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
                    margin-bottom : 40px;
                   
                    
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
                    margin-top: 10px;
                    text-align:center;
                    
                }
                p{
                    margin-left: 5%;
                    font-size: 20px;
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
                    margin-top: 20px;
                    font-size : 23px;
                    
        
        
                }
        
                .table1 {
                    margin-top: 70px;
                    border-spacing: 0;
                    border-top: 1px solid black;
                }
        
                .table1 tr {
                    font-weight: bold;
        
                }
        
              
        
                .table2 tr {
        
                    margin-top: 4px;
                }


               
                
             </style>
         </head>
         ';




    $HTML .= "
            <body>
                <div class = 'container'>
                    <p class = 'header'><u>FEE STATUS</u></p>
                
            
        ";

    $HTML .= "<p class = 'detailheader'>STATUS:<strong>$feedisplay</strong></p>";
    $HTML .= "<p class = 'detailheader'>NO OF STUDENTS : $num_rows</p>";

    $HTML .= '
    
                
    <table class="table1">
    <tr>
    
      <th>Name</th>
      <th>Admno</th>
      <th>Batch No</th>
      <th>Batch Name</th>
    
    
    </tr>
  </table>
    ';
    while ($row = mysqli_fetch_assoc($result1)) {
        $id++;
        $admno = $row['admno'];
        $name = $row['name'];

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
        <table class= "table2">
        <tr>
        <td>'.$name.'</td>
        <td>'.$admno.'</td>
                        
        <td>'.$batchno.'</td>
        <td>'.$batchname.'</td>
        </tr>
        </table>
        ';
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
